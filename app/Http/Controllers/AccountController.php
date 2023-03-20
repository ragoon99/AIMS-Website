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
        return view('admin\settings\editSettings', ['which'=>$data]);
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
        // dd($request);

        $query = admin_user::find(session('id'));

        if($request['which']=='email'){

            $validated = $request->validate([
                'nEmail'=>'required',
                'passphrase'=>['required', 'min:5'],
            ]);

            if ($query['passphrase'] == $request['passphrase']){
                $query->email = $request['nEmail'];

                $query->save();

                return redirect(route('asc.index'))->with('success', 'Email Changed Successfully');
            }
            else {
                return back()->with('error', 'Wrong Password');
            }

        }
        else if ($request['which']=='password') {
            $validated = $request->validate([
                'oldPassword'=>['required', 'min:5'],
                'newPassword'=>['required', 'min:5'],
                'rePassword'=>['required', 'min:5'],
            ]);

            if ($query['passphrase'] == $request['oldPassword']){
                if($request['newPassword']==$request['rePassword']){

                    $query->passphrase = $request['newPassword'];

                    $query->save();

                    return redirect(route('asc.index'))->with('success', 'Password Changed Successfully');
                } else {

                    return back()->with('error', 'Please Enter the Same Password');
                }
            }
            else {
                return back()->with('error', 'Wrong Password');
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
