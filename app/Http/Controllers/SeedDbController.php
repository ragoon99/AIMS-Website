<?php

namespace App\Http\Controllers;

use App\Exports\SeedExport;
use App\Models\seed_data;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class SeedDbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = seed_data::all();

        if(session('user')=='admin'){
            return view('admin/database/seed/index', ['datas'=>$query]);
        } else {
            return view('database/seed/index', ['datas'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('user')=='admin'){
            return view('admin/database/seed/create');
        } else {
            return view('database/seed/create');
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
            'growth'=>['integer'],
        ]);

        $data = $request->merge([
            'crop'=>strip_tags($request['crop']),
            'growth'=>strip_tags($request['growth']),
        ]);

        $query = seed_data::where('name', $data['name'])->exists();

        if($query){
            return redirect()->route('seed.create')->with('failed', 'Seed Already In Database');
        } else {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/seed'), $imageName);

            $sData = new seed_data();

            $sData->name = $data->name;
            $sData->growth = $data->growth;
            $sData->imgName = $imageName;

            $sData->save();

            return redirect()->route('seed.index')->with('success', 'Seed Successfully Added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = seed_data::find($id);
        return view('admin/database/seed/edit', ['data'=>$data]);
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
            'growth'=>['integer'],
        ]);

        $data = $request->merge([
            'name'=>strip_tags($request['name']),
            'growth'=>strip_tags($request['growth']),
        ]);

        $query = seed_data::where('name', $data['name'])->exists();

        if($query){
            return back()->with('failed', 'Seed Already In Database');
        } else {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/seed'), $imageName);

            $sData = seed_data::find($id);

            $sData->name = $data->name;
            $sData->growth = $data->growth;
            $sData->imgName = $imageName;

            $sData->save();

            return redirect()->route('seed.index')->with('success', 'Seed Updated In Database');
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
        $data = seed_data::find($id);

        $data->delete();

        return redirect()->route('seed.index')->with('success', 'Record Deleted From Database');
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $datas = seed_data::all()->toArray();

        // share data to view
        view()->share('crop',$datas);
        $pdf = PDF::loadView('admin/database/crop/index', compact('datas'));

        // download PDF file with download method
        return $pdf->download('seed_data.pdf');
    }

    public function export(){
        return Excel::download(new SeedExport, 'seed.xlsx');
    }
}
