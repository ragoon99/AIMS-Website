<?php

namespace App\Http\Controllers;

use App\Exports\EquipmentExport;
use App\Models\equipment_data;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EquipDbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = equipment_data::all();

        if(session('user')=='admin'){
            return view('admin/database/equipment/index', ['datas'=>$query]);
        } else {
            return view('database/equipment/index', ['datas'=>$query]);
        }

        // return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('user')=='admin'){
            return view('admin/database/equipment/create');
        } else {
            return view('database/equipment/create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
        ]);

        $data = $request->merge([
            'name'=>strip_tags($request['name']),
            'mrp'=>strip_tags($request['mrp']),
        ]);

        $query = equipment_data::where('name', $data['name'])->exists();

        if($query){
            return redirect()->route('equipment.create')->with('failed', 'Equipment Already In Database');
        } else {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/equipment'), $imageName);

            $sData = new equipment_data();

            $sData->name = $request->name;
            $sData->mrp = $request->mrp;
            $sData->imgName = $imageName;

            $sData->save();

            return redirect()->route('equipment.index')->with('success', 'Equipment Added To Database');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = equipment_data::find($id);

        return view('admin/database/equipment/edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
        ]);

        $data = $request->merge([
            'name'=>strip_tags($request['name']),
            'mrp'=>strip_tags($request['mrp']),
        ]);

        $query = equipment_data::where('name', $data['name'])->exists();

        if($query){
            return back()->with('failed', 'Equipment Already In Database');
        } else {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/equipment'), $imageName);

            $sData = equipment_data::find($id);

            $sData->name = $data->name;
            $sData->mrp = $data->mrp;
            $sData->imgName = $imageName;

            $sData->save();

            return redirect()->route('equipment.index')->with('success', 'Equipment Updated In Database');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = equipment_data::find($id);

        $data->delete();

        return redirect()->route('equipment.index')->with('success', 'Equipment Deleted From Database');
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $datas = equipment_data::all()->toArray();

        // share data to view
        view()->share('crop',$datas);
        $pdf = PDF::loadView('admin/database/crop/index', compact('datas'));

        // download PDF file with download method
        return $pdf->download('equipment_data.pdf');
    }

    public function export(){
        return Excel::download(new EquipmentExport, 'equipment.xlsx');
    }
}
