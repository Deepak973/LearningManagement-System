<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendotp;
use Session;
use App\Models\CourseBatch;
use App\Models\CoursePdf;
use App\Models\TrainingSchedule;
Use \Carbon\Carbon;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    
    if($request->submit=="login"){
        
        $user=User::where('email',$request->email)->first();

        if(empty($user)) 
        { 
            //return redirect()->back()->withErrors(['name' => 'You are not Registered']);
            return view("user.login")->with(session()->flash('message', 'danger|Invalid Credentials .'));
        }
         else
            {
                if($user->status=="1")
                    {
                        return view("user.login")->with(session()->flash('message', 'danger|Your account is deactivated, please contact admin .')); 
                    }

                if($request->pwd==$user->password)
                    {
                        $pp =$user->profile_pic;
                        Session::put('user', $user);
                        //dd(Session::get('user')->id);
                        if($user->user_type=='Trainee')
                        {
                        //dd($user->user_type);
                        return redirect()->route('user_dashboard')->with('message', 'sucess|login Sucessfull');
                        }
                        else
                        {
                        return redirect()->route('trainer_dashboard')->with('message', 'sucess|login Sucessfull');   
                        }
                    }

                else
                    {
                        return view("user.login")->with(session()->flash('message', 'danger|Invalid Password .'));
                    }

            }   
    }
     if($request->submit=="register")
     {
     
        return view('user.register');
     }
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
        //
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
        //
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

    public function register(Request $request)
    {
        //dd($request->all());
       $user=AuthUser::where('email',$request->email)->first();
        //dd($request->email1);
        
    if(empty($request->pwd)){
               
        
        if(empty($user))
        {
            //return redirect()->back()->withErrors(['name' => 'You are not Authorized']);
            
            return view("user.register")->with(session()->flash('message', 'danger|You are not Authorized .'));
           
        }
        else
        {
            $check=User::where('email',$request->email)->first();
            if(empty($check))
            {
            $otp = mt_rand(1000,9999);
            $data=['otp'=>$otp,
                   'email'=>$request->email];
            //dd($data);
            Mail::to($data['email'])->send(new sendotp($data));
            return view("user.otp",compact('data'));
            }
            else
            {
                return view("user.register")->with(session()->flash('message', 'danger|You are already registered .'));

            }
        }
    }
    else
    {  
        
       
        // dd($request->all());
        $user1=new User();
        $user1->username=$request->uname;
        $user1->email=$request->email;
        $user1->password=$request->pwd;
        $user1->gender=$request->gender;
        $user1->phone_no=$request->pno;
        $user1->address=$request->add;
        $user1->user_type=$user->user_type;
        $user1->batch_id=$user->batch_id;
        
        if($request->hasFile("pp")) {

            $image = $request->file("pp");
            $imageCount = 1;
         
            $filename = intval(microtime(true)) . "_" . ($imageCount++) . "." . $image->getClientOriginalExtension();
            $image->move(public_path("Media/Profile_pics"), $filename);

            
            $user1->profile_pic = "Media/Profile_pics/" . $filename;;
            $user1->save();
            
        }

        // $user1->profile_pic=$request->pp;
      

        $user1->save();
        return redirect("/")->with(session()->flash('message', 'success|Registered Sucessfully .'));


    }

    }

    public function verifyotp(Request $request)
    {
            //dd($request->all());
        
        if($request->userotp==$request->otp)
        {
            return view("user.register",compact('request'));
        }
        else
        {
            // dd($request->all());
            //  return redirect()->back()->withErrors(['name' => 'Wrong OTP']);
            //  echo"Wrong OTP";
            $data=[
                "errors"=>"wrong otp",
                "email"=>$request->email,
                "otp"=>$request->otp

            ];
            return view("user.otp",compact('data'));
             
                
            
        }
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function trainerdashboard()
    {
        return view('trainer.dashboard');
    }

    public function showcourse()
    {
        $courses = CourseBatch::select('courses.*')
        ->join('courses','courses.id','=','course_batches.course_id')
        ->where('course_batches.batch_id',session('user')->batch_id)
        ->where('status','active')
        ->get();

        foreach($courses as $course)
        {
            $pdfs=CoursePdf::where('course_id',$course->id)->get();
            $data[] =[
                "id"=>$course->id,
                "name"=>$course->name,
                "description"=>$course->description,
                "startdate"=>$course->start_date,
                "pdf"=>$pdfs,
                "star"=>"0"
            ];
        }

        // if(empty($data))
        // {
        
        //     return view("user.courses.index", compact("data"));
        // }
        
        //  dd($data[0]['id']);
        //  dd($data[0]['pdf'][0]->pdf);
        return view("user.courses.index", compact("data"));
    }



    
}
