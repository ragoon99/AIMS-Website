<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuth;
use App\Models\admin_user;
use Illuminate\Http\Request;

class AdminController extends Controller{
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
        return redirect('admin/login');
    }

    function UserAuth(UserAuth $request){

        $query = admin_user::where('eid', $request['id'])->where('passphrase', $request['passphrase'])->first();

        if($query){
            $request->session()->put('id', $query['eid']);
            $request->session()->put('fname', $query['fname']);
            $request->session()->put('lname', $query['lname']);

            return redirect('adminDash');
        } else {
            return view('admin/login', ['msg'=>'true']);
        }
    }

    function adminDisplay(){
        $query = admin_user::all();

        return view('admin/database/users/adminUsers', ['datas'=>$query]);
    }

    function getLogout(){
        session()->pull('id');

        return redirect('admin');
    }
}
