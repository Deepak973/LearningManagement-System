<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
  

    public function adminlogin(Request $request)
    {
        $admin=Admin::where('email',$request->email)->first();
        if(empty($admin))
        {
            return view("admin.adminlogin")->with(session()->flash('message', 'danger|Invalid Credentials .'));
        }
        else
        {
            if($admin->password==$request->pwd){
                Session::put('admin', $admin);
                return view("admin.dashboard")->with(session()->flash('message', 'success|Login Succesfull .'));

            }
            else
            {
                return view("admin.adminlogin")->with(session()->flash('message', 'danger|Invalid Password .'));
            }
        }
        
    }

    public function admindashboard()
    {
        return view('admin.dashboard');
    }
}
