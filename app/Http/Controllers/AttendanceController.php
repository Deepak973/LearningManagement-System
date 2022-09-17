<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TrainingSchedule;
use App\Models\CourseBatch;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $routePrefix = "attendances.";
    private $viewFolder = "trainer.attendance.";
    
    public function index()
    {
        $todaystrainings = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batch_name','batches.id as batch_id')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->leftJoin('batches','batches.id','=','course_batches.batch_id')
        ->where('training_schedules.trainer_id','=',session('user')->id)
        ->whereDate('training_schedules.date','=',Carbon::now())
        ->get();

        $previoustrainings = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batch_name','batches.id as batch_id')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->leftJoin('batches','batches.id','=','course_batches.batch_id')
        ->where('training_schedules.trainer_id','=',session('user')->id)
        ->whereDate('training_schedules.date','<',Carbon::now())
        ->get();

        return view($this->viewFolder . "index", compact("todaystrainings","previoustrainings"));
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
        $request->validate([
            "training_schedule_id" => "required",
            "attendance" => "required",   
        ]);

        $training = TrainingSchedule::where("id",$request->training_schedule_id)->first();
        $training->attendance_status="done";
        $training->save();

        if(!empty($request->attendance))
        {
            foreach ($request->attendance as $ad)
            {
                $attend=new Attendance();
                $attend->training_schedules_id= $request->training_schedule_id;
                $attend->trainee_id=$ad; 
                $attend->save();
            }
        }
        return redirect()->route($this->routePrefix . "index");
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id,$ids)
    {
        //  dd($ids);

        $training_schedule_id = $ids;
        $traineelist= User::select('id','username','profile_pic','email')
        ->where('batch_id',$id)
        ->where('status','0')
        ->get();
        // dd($trianngscheduleid);

        return view($this->viewFolder . "show", compact("traineelist","training_schedule_id"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */

    public function edit(Attendance $attendance)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function show_trainee_attendance()
    {
     
        
        $total_trainings = TrainingSchedule::select(DB::raw('count(training_schedules.id) as total_count, courses.name'))
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->join('batches','batches.id','=','course_batches.batch_id')
        ->join('courses','courses.id','=','course_batches.course_id')
        ->where('batches.id',session('user')->batch_id)
        ->where('training_schedules.attendance_status',"done")
        ->groupBy('courses.name')
        ->get();

        // dd($total_trainings);

        $attended_trainings = Attendance::select(DB::raw('count(attendances.training_schedules_id) as total_count, courses.name'))
        ->join('training_schedules','training_schedules.id','=','attendances.training_schedules_id')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->join('batches','batches.id','=','course_batches.batch_id')
        ->join('courses','courses.id','=','course_batches.course_id')
        ->where('batches.id',session('user')->batch_id)
        ->where('training_schedules.attendance_status',"done")
        ->where('attendances.trainee_id',session('user')->id)
        ->groupBy('courses.name')
        ->get();
          

        // dd($attended_trainings);
        // foreach($total_trainings as $total)
        // {
            
        //     $data[] =[
        //         "coursename"=>$total->name,
        //         "total"=>$total->total_count,
        //     ];
        // }

        // foreach($attended_trainings as $attended)
        // {
            
        //     $data[] =[
        //         "coursenameattended"=>$attended->name,
        //         "totalattended"=>$attended->total_count,
        //     ];
        // }

        // dd($data);

        return view("user.attendance.index", compact("total_trainings","attended_trainings"));
        // dd($total_trainings);

    }
}
