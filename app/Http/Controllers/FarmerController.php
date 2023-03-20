<?php

namespace App\Http\Controllers;

use App\Exports\FarmerExport;
use App\Models\farmers;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class FarmerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = farmers::all();

        return view('admin/database/users/farmer/index', ['datas'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/database/users/farmer/create');
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
            'fname' => ['required', 'alpha' ],
            'name' => ['alpha' ],
            'lname' => ['required', 'alpha'],
            'age' => ['required', 'integer'],
            'address' => ['required'],
            'province' => ['required', 'integer'],
            'state' => ['required'],
        ]);

        $data = $request->merge([
            'fname' => strip_tags($request['fname']),
            'name' => strip_tags($request['mname']),
            'lname' => strip_tags($request['lname']),
            'age' => strip_tags($request['age']),
            'address' => strip_tags($request['address']),
            'province' => strip_tags($request['province']),
            'state' => strip_tags($request['state']),
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/farmer'), $imageName);

        $sData = new farmers();

        $sData->fname = $data->fname;
        $sData->mname = $data->mname;
        $sData->lname = $data->lname;
        $sData->age = $data->age;
        $sData->sex = $data->gender;
        $sData->dob = $data->dob;
        $sData->address = $data->address;
        $sData->province = $data->province;
        $sData->state = $data->state;
        $sData->imgName = $imageName;

        $sData->save();

        return redirect()->route('farmer.index')->with('success', 'Record Added Successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = farmers::find($id);
        return view('admin/database/users/farmer/edit', ['data'=>$data]);
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
            'fname' => ['required', 'alpha' ],
            'name' => ['alpha' ],
            'lname' => ['required', 'alpha'],
            'age' => ['required', 'integer'],
            'address' => ['required'],
            'province' => ['required', 'integer'],
            'state' => ['required'],
        ]);

        $data = $request->merge([
            'fname' => strip_tags($request['fname']),
            'name' => strip_tags($request['mname']),
            'lname' => strip_tags($request['lname']),
            'age' => strip_tags($request['age']),
            'address' => strip_tags($request['address']),
            'province' => strip_tags($request['province']),
            'state' => strip_tags($request['state']),
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/farmer'), $imageName);

        $sData = farmers::find($id);

        $sData->fname = $data->fname;
        $sData->mname = $data->mname;
        $sData->lname = $data->lname;
        $sData->age = $data->age;
        $sData->sex = $data->gender;
        $sData->dob = $data->dob;
        $sData->address = $data->address;
        $sData->province = $data->province;
        $sData->state = $data->state;
        $sData->imgName = $imageName;

        $sData->save();

        return redirect()->route('farmer.index')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = farmers::find($id);

        $data->delete();

        return redirect()->route('farmer.index')->with('success', 'Record Deleted From Database');
    }

    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        $datas = farmers::all()->toArray();

        // share data to view
        view()->share('crop',$datas);
        $pdf = PDF::loadView('admin/database/crop/index', compact('datas'));

        // download PDF file with download method
        return $pdf->download('farmer_data.pdf');
    }

    public function export(){
        return Excel::download(new FarmerExport, 'farmers.xlsx');
    }
}
