<?php

namespace App\Http\Controllers;

use App\Models\seed_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        return view('admin/database/seed/index', ['datas'=>$query]);

        // return $query;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/database/seed/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sData = new seed_data();

        $sData->name = $request->name;

        $sData->save();

        return redirect()->route('seed.index');
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
        $sData = seed_data::find($id);

        $sData->name = $request->name;

        $sData->save();

        return redirect()->route('seed.index');

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
        $data = seed_data::find($id);

        $data->delete();

        return redirect(route('seed.index'));
    }
}
