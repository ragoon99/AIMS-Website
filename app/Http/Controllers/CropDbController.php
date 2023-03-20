<?php

namespace App\Http\Controllers;

use App\Exports\CropExport;
use App\Models\crops_data;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CropDbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = crops_data::all();

        if(session('user') == 'admin'){
            return view('admin/database/crop/index', compact('datas'));
        } else {
            return view('database/crop/index', compact('datas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('user')=='admin'){;
            return view('admin/database/crop/create');
        } else {
            return view('database/crop/create');
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
            'crop' => ['required', 'min:3']
        ]);

        $data = $request->merge([
            'crop'=>strip_tags($request['crop']),
            'municipality'=>strip_tags($request['municipality']),
            'ward'=>strip_tags($request['ward']),
            'mrp'=>strip_tags($request['mrp']),
            'frp'=>strip_tags($request['frp']),
        ]);

        $query = crops_data::where('name', $data['crop'])->exists();

        if($query){
            return redirect()->route('crop.create')->with('failed', 'Crop Already In Database');
        } else {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/crop'), $imageName);

            $sData = new crops_data();

            $sData->name = $data->crop;
            $sData->province = $data->province;
            $sData->municipality = $data->municipality;
            $sData->ward = $data->ward;
            $sData->mrp = $data->mrp;
            $sData->frp = $data->frp;
            $sData->imgName = $imageName;

            $sData->save();

            return redirect()->route('crop.index')->with('success', 'Crop Added Successfully');
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
        $data = crops_data::find($id);
        return view('admin/database/crop/edit', ['data'=>$data]);
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
            'crop'=>strip_tags($request['crop']),
            'municipality'=>strip_tags($request['municipality']),
            'ward'=>strip_tags($request['ward']),
            'mrp'=>strip_tags($request['mrp']),
            'frp'=>strip_tags($request['frp']),
        ]);

        $query = crops_data::where('name', $data['name'])->exists();

        if($query){
            return back()->with('failed', 'Crop Already In Database');
        } else {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/crop'), $imageName);

            $sData = crops_data::find($id);

            $sData->name = $data->name;
            $sData->province = $data->province;
            $sData->municipality = $data->municipality;
            $sData->ward = $data->ward;
            $sData->mrp = $data->mrp;
            $sData->frp = $data->frp;
            $sData->imgName = $imageName;

            $sData->save();

            return redirect()->route('crop.index')->with('success', 'Crop Updated Successfully');
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
        $data = crops_data::find($id);

        $data->delete();

        return redirect()->route('crop.index')->with('success', 'Crop Deleted From Database');
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $datas = crops_data::all()->toArray();

        // share data to view
        view()->share('crop',$datas);
        $pdf = PDF::loadView('admin/database/crop/index', compact('datas'));

        // download PDF file with download method
        return $pdf->download('crop_data.pdf');
    }

    public function export(){
        return Excel::download(new CropExport, 'crop.xlsx');
    }
}
