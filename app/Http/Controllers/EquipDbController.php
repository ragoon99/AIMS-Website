<?php

namespace App\Http\Controllers;

use App\Models\equipment_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        return view('admin/database/equipment/index', ['datas'=>$query]);

        // return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/database/equipment/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sData = new equipment_data();

        $sData->name = $request->name;

        $sData->save();

        return redirect()->route('equipment.index');
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
        $sData = equipment_data::find($id);

        $sData->name = $request->name;

        $sData->save();

        return redirect()->route('equipment.index');

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
        $data = equipment_data::find($id);

        $data->delete();

        return redirect(route('equipment.index'));
    }
}
