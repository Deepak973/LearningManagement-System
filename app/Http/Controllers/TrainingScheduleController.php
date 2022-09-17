<?php

namespace App\Http\Controllers;

use App\Models\TrainingSchedule;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseBatch;
use App\Models\batch;
use App\Models\User;
use Validator,Redirect,Response;
Use \Carbon\Carbon;

class TrainingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $routePrefix = "trainingschedules.";
    private $viewFolder = "admin.trainingschedules.";

    public function index()
    {

       $trainingschedules = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batchname')
       ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
       ->leftJoin('courses','courses.id','=','course_batches.course_id')
       ->leftJoin('batches','batches.id','=','course_batches.batch_id')
       ->whereDate('training_schedules.date','>',Carbon::now())
       ->get();

       $todaystrainings = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batchname')
       ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
       ->leftJoin('courses','courses.id','=','course_batches.course_id')
       ->leftJoin('batches','batches.id','=','course_batches.batch_id')
       ->whereDate('training_schedules.date','=',Carbon::now())
       ->get();

       $previoustrainings = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batchname')
       ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
       ->leftJoin('courses','courses.id','=','course_batches.course_id')
       ->leftJoin('batches','batches.id','=','course_batches.batch_id')
       ->whereDate('training_schedules.date','<',Carbon::now())
       ->get();

    //    dd($trainingschedules);

   
      
       return view($this->viewFolder . "index", compact("trainingschedules","todaystrainings","previoustrainings"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trainings = new TrainingSchedule();
        $trainer=User::where("user_type", "Trainer")->get();
        $batches=Batch::all();
        $course= Course::all();
        // $selectedcourse=Course::where('id',$course->id)->pluck('course')->toArray();
        // $selectedtrainer=User::where('id',$trainer->id)->pluck('user_name')->toArray();
        // $selectedoffercode=FitnessOfferCode::where('fitness_uuid',$fitness->uuid)->pluck('offercode_uuid')->toArray();
        return view($this->viewFolder . "create", compact("batches","course","trainer","trainings"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        $request->validate([
            "course_name" => "required",
            "batch_name" => "required",
            "date" => "required",
            "start_time"=>"required",
            "end_time"=>"required",
            "venue" => "required",
            "trainer"=>"required",  
        ]);

        
        $cbid = CourseBatch::where("course_id",$request->course_name)
        ->where("batch_id",$request->batch_name)->first();
 // 2 -3  2.5
        //checking

        // dd($request ->start_time , $request->end_time);
        $start_time = date('H:i:s', strtotime($request->start_time));
        // dd($start_time);
// dd($cbid->batch_course_id);
        $checktime = TrainingSchedule::whereDate("date","=",$request->date)
        ->whereTime("start_time",">=", $request->start_time)
        ->whereTime("start_time","<=", $request->end_time)
        ->where("venue","=",$request->venue)
        ->where("trainer_id","=",$request->trainer)
        ->where("course_batch_id","=",$cbid->batch_course_id)
        ->first();
  

        // dd($checktime);

        // $checkvenue = TrainingSchedule::whereDate("date","=",$request->date)
        // ->whereTime("start_time",">=", $request->start_time)
        // ->whereTime("start_time","<=", $request->end_time)
        // ->orwhereTime("end_time",">=", $request->start_time)
        // ->orwhereTime("end_time",">=", $request->end_time)
        // ->where("venue","=",$request->venue)
        // ->first();
        
        // dd($checkvenue);
        if($checktime!=null)
        {
            
            return redirect()->route($this->routePrefix . "index")->with("error", "This time slot is not available");

        }

        // if($checkvenue!=null)
        // {
            
        //     return redirect()->route($this->routePrefix . "index")->with("error", "This venue is not availabe for current date and time");

        // }
        // dd($cbid->id);
        $trainingschedules = new TrainingSchedule();
        $trainingschedules->course_batch_id=$cbid->batch_course_id;
        $trainingschedules->date=$request->date;
        $trainingschedules->start_time=$request->start_time;
        $trainingschedules->end_time=$request->end_time;
        $trainingschedules->venue=$request->venue;
        $trainingschedules->trainer_id=$request->trainer;
        $trainingschedules->attendance_status="pending";

        $trainingschedules->save();

        return redirect()->route($this->routePrefix . "index")->with("success", "Training Scheduled Successfully");
    
    }


 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingSchedule  $trainingSchedule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainingschedules = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batchname','users.username')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->leftJoin('batches','batches.id','=','course_batches.batch_id')
        ->leftJoin('users','users.id','=','training_schedules.trainer_id')
        ->where("training_schedules.id",$id)->first();

        // dd($trainingschedules);

        return view($this->viewFolder . "show", compact("trainingschedules"));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingSchedule  $trainingSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingSchedule $trainingSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingSchedule  $trainingSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingSchedule $trainingSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingSchedule  $trainingSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainings = TrainingSchedule::where("id", $id)->first();
        abort_if(empty($trainings), 404);

        $trainings->delete();
        return redirect()->route($this->routePrefix . "index")->with("success", "Training Schedule terminated");
    }


    public function get_course(Request $request){
       
        $validator = Validator::make($request->all(), [
            'id' => 'required',
         ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
        $course_name=CourseBatch::select('courses.*')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->where('batch_id',$request->id)->get();

                        
        // $data="<select class='form-control' id='all_course' name='course_name' required>";
        $data="";   
        foreach($course_name as $course){
           
            $data.="<option value='".$course->id."'>".$course->name."</option>";
           
        }
        
    return $data;
    }
}
