<?php

namespace App\Http\Controllers;

use App\Models\admin_user;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = admin_user::find(session('id'));

        return view('admin/settings/accountSetting', ['data'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($data)
    {
        if($data=='email'){
            return view('admin\settings\editSettings', ['which'=>$data]);
        }
        else if ($data == 'password'){
            return view('admin\settings\editSettings', ['which'=>$data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $query = admin_user::find(session('id'));

        if($request['which']=='email'){

            $query->email = $request['nEmail'];

            $query->save();

            return redirect(route('asc.index'));
        }
        else if ($request['which']=='passphrase') {

            if ($query['passphrase']==$request['oldPassphrase']){
                if($request['newPassword']!=$request['rePassword']){

                    return "Please Enter Same Password";

                } else {
                    $query->passphrase = $request['newPassword'];

                    $query->save();

                    return redirect(route('asc.index'));
                }
            }
            else {
                return "Wrong Password";
                // return view('admin\settings\editSettings', ['msg'=>'Wrong Password']);
            }
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
        //
    }
}
