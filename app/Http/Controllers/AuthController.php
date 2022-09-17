<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthUser;
use App\Models\Batch;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $routePrefix = "authusers.";
    private $viewFolder = "admin.authuser.";

    public function index()
    {
       $authusers = AuthUser::all();
       return view($this->viewFolder . "index", compact("authusers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authusers = new AuthUser();
        $batches=Batch::all();
        $selectedbatch=Batch::where('id',$authusers->batch_id)->pluck('name')->toArray();
        return view($this->viewFolder . "create", compact("authusers","batches","selectedbatch"));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required",
            "user_type" => "required",
            "batch_id" => "required",  
        ]);
         
        $checkauthuser = AuthUser::where("email", $request->email)->first();
        
        if($checkauthuser!=null)
        {
            return redirect()->route($this->routePrefix . "index")->with("error", "This user is already authorized");

        }
        $authusers=new AuthUser();
        $authusers->email=$request->email;
        $authusers->user_type=$request->user_type;
        $authusers->batch_id=$request->batch_id;
        $authusers->save();

        return redirect()->route($this->routePrefix . "index")->with("success", "User created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authusers = AuthUser::where("id", $id)->first();
        $users =User::where("email",$authusers->email)->first();
        return view($this->viewFolder . "show", compact("authusers","users"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $authusers = AuthUser::where("id", $id)->first();
        abort_if(empty($authusers), 404);
        $selectedbatch=Batch::where('id',$authusers->batch_id)->pluck('name')->toArray();
       // dd($selectedbatch);
        $batches=Batch::all();

        return view($this->viewFolder . "edit", compact("authusers","selectedbatch","batches"));
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
        $authusers = AuthUser::where("id", $id)->first();
        abort_if(empty($authusers), 404);

        $request->validate([
            "email" => "required",
            "user_type" => "required",
            "batch_id" => "required",  
        ]);

        
        $authusers->email=$request->email;
        $authusers->user_type=$request->user_type;
        $authusers->batch_id=$request->batch_id;
        $authusers->save();

        return redirect()->route($this->routePrefix . "index")->with("success", "User updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authusers = AuthUser::where("id", $id)->first();
        abort_if(empty($authusers), 404);

        $authusers->delete();
        return redirect()->route($this->routePrefix . "index")->with("success", "User deleted");
    }
}
