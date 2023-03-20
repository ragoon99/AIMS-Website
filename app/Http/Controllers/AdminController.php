<?php

namespace App\Http\Controllers;

use App\Models\admin_user;
use Illuminate\Http\Request;

class AdminController extends Controller{
    function img(){

    }

    function getLogin(){
        if(session('id')){
            return redirect('adminDash');
        }
        return view('admin/login');
    }

    function getDashboard(){
        if(session('id')){
            return view('admin/dashboard');
        }
        return redirect('admin');
    }

    function UserAuth(Request $request){

        $validated = $request->validate([
            'id' => 'required|integer|min:7',
            'password' => 'required|min:5'
        ]);

        $query = admin_user::where('eid', $request['id'])->where('passphrase', $request['password'])->first();

        if($query){
            $request->session()->put('id', $query['eid']);
            $request->session()->put('fname', $query['fname']);
            $request->session()->put('lname', $query['lname']);
            $request->session()->put('user', 'admin');

            return redirect('adminDash');
        } else {
            return redirect('admin')->with('status', 'Wrong Password');
        }
    }

    function adminDisplay(){
        $query = admin_user::all();

        return view('admin/database/users/adminUsers', ['datas'=>$query]);
    }

    function getLogout(){
        session()->forget('id');
        session()->forget('user');
        session()->flush();

        return redirect('admin');
    }

    function getPassReset(){
        return view('admin/passReset');
    }
}
