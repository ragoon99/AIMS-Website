<?php

namespace App\Http\Controllers;

use App\Models\normal_users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function getLoginPage(){
        if(session()->has('uid')){
            return redirect('/');
        }
        return view('login');
    }

    function postCreateAcc(Request $request){
        $validated = $request->validate([
            'fname' => 'required|min:3|alpha',
            'lname' => 'required|min:3|alpha',
            'address' => 'required|min:6',
            'age' => 'required|min:3|integer',
            'email' => 'required|min:5',
            'password' => 'required|min:5',
        ]);

        $data = $request->merge([
            'fname'=>strip_tags($request['fname']),
            'lname'=>strip_tags($request['lname']),
            'address'=>strip_tags($request['address']),
            'age'=>strip_tags($request['age']),
            'email'=>strip_tags($request['email']),
            'password'=>strip_tags($request['password']),
        ]);

        $query = normal_users::where('email', $data['email'])->exists();

        if($query){
            return redirect()->route('signup')->with('failed', 'Account with Given Email Already Exists');
        } else {
            $sData = new normal_users();

            $sData->fname = $data->fname;
            $sData->lname = $data->lname;
            $sData->address = $data->address;
            $sData->age = $data->age;
            $sData->gender = $data->gender;
            $sData->email = $data->email;
            $sData->password = $data->password;

            $sData->save();

            return redirect('/');
        }
    }

    function getAcc(Request $request){


        $validated = $request->validate([
            'password' => 'required|min:5'
        ]);

        $data = $request->merge([
            'email'=>strip_tags($request['email']),
            'password'=>strip_tags($request['password']),
        ]);

        $query = normal_users::where('email', $data['email'])->where('password', $data['password'])->first();

        if($query){
            $data->session()->put('uid', $query['uid']);
            $data->session()->put('fname', $query['fname']);
            $data->session()->put('lname', $query['lname']);
            $data->session()->put('user', 'normal');

            return redirect('/');
        } else {
            return redirect('login')->with('status', 'Wrong Password or Email');
        }
    }

    function getAccReset(){

    }

    function getLogout(){
        session()->forget('uid');
        session()->forget('fname');
        session()->forget('lname');
        session()->forget('user');
        session()->flush();

        return redirect('login');
    }
}
