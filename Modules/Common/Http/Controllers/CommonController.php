<?php

namespace Modules\Common\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommonController extends Controller
{

    public function index()
    {
        return view('common::index');
    }

    public function get_login()
    {
        return view('common::login');
    }

    public function post_login(Request $request)
    {
        $rememberme = $request->rememberme ? 1 : 0;
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'type'=> 1],$rememberme)){
            return redirect()->route('admin_home');
        }else{
            Session::flash('message', 'email is incorrect or password');
            Session::flash('alert-class', 'alert-danger');
            return back();
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('get_login');
    }

}
