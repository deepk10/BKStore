<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //

    public function index(Request $request){
        if($request->session()->has('loggedInUserId')){
            return redirect('admin/dashboard');
        }else{
         return view('admin.login');
        }
    }
    public function auth(Request $request){
        $email = $request->post('email');
        $password = $request->post('password');
        $admin = new Admin();
        $result= $admin->where(['email'=>$email,'password'=>$password])->get();
        if(isset($result[0])){
            $request->session()->put('loggedInUserId', $result[0]->id);
            $request->session()->put('email', $result[0]->email);
            return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error','Wrong login details');
            return redirect('admin');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('admin');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}