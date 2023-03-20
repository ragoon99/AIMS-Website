<?php

namespace App\Http\Controllers;

use App\Exports\LivestockExport;
use App\Models\livestock_data;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LivestockDbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = livestock_data::all();

        if(session('user')=='admin'){
            return view('admin/database/livestock/index', ['datas'=>$query]);
        } else {
            return view('database/livestock/index', ['datas'=>$query]);
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
            return view('admin/database/livestock/create');
        } else {
            return view('database/livestock/create');
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
            'name' => ['required', 'min:3']
        ]);

        $data = $request->merge([
            'name'=>strip_tags($request['name']),
            'mrp'=>strip_tags($request['mrp']),
            'frp'=>strip_tags($request['frp']),
        ]);

        $query = livestock_data::where('name', $data['name'])->exists();

        if($query){
            return redirect()->route('livestock.create')->with('failed', 'Livestock Already In Database');
        } else {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/livestock'), $imageName);

            $sData = new livestock_data();

            $sData->name = $data->name;
            $sData->mrp = $data->mrp;
            $sData->frp = $data->frp;
            $sData->imgName = $imageName;

            $sData->save();

            return redirect()->route('livestock.index')->with('success', 'Livestock Successfully Added');
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
        $data = livestock_data::find($id);
        return view('admin/database/livestock/edit', ['data'=>$data]);
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
            'name' => ['required', 'min:3']
        ]);

        $data = $request->merge([
            'name'=>strip_tags($request['name']),
            'mrp'=>strip_tags($request['mrp']),
            'frp'=>strip_tags($request['frp']),
        ]);

        $query = livestock_data::where('name', $data['name'])->exists();

        if($query){
            return back()->with('failed', 'Livestock Already In Database');
        } else {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/livestock'), $imageName);

            $sData = livestock_data::find($id);

            $sData->name = $data->name;
            $sData->mrp = $data->mrp;
            $sData->frp = $data->frp;
            $sData->imgName = $imageName;

            $sData->save();

            return redirect()->route('livestock.index')->with('success', 'Livestock Updated In Database');

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
        $data = livestock_data::find($id);

        $data->delete();

        return redirect()->route('livestock.index')->with('success', 'Livestock Deleted From Database');
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $datas = livestock_data::all()->toArray();

        // share data to view
        view()->share('crop',$datas);
        $pdf = PDF::loadView('admin/database/crop/index', compact('datas'));

        // download PDF file with download method
        return $pdf->download('livestock_data.pdf');
    }

    public function export(){
        return Excel::download(new LivestockExport, 'livestock.xlsx');
    }
}
