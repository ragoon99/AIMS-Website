<?php

namespace App\Http\Controllers;

use App\Models\livestock_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        return view('admin/database/livestock/index', ['datas'=>$query]);

        // return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/database/livestock/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sData = new livestock_data();

        $sData->name = $request->name;

        $sData->save();

        return redirect()->route('livestock.index');
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
        $sData = livestock_data::find($id);

        $sData->name = $request->name;

        $sData->save();

        return redirect()->route('livestock.index');

        // return $request->Input();
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

        return redirect(route('livestock.index'));
    }
}
