<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseBatch;
use App\Models\CoursePdf;
use App\Models\TrainingSchedule;
use App\Models\User;
Use \Carbon\Carbon;

class ShowTrainingController extends Controller
{
    public function show_user_trainings()
    {

        $courses = CourseBatch::select('courses.*')
        ->join('courses','courses.id','=','course_batches.course_id')
        ->where('course_batches.batch_id',session('user')->batch_id)
        ->where('status','active')
        ->get();
      
        $todaystrainings = TrainingSchedule::select('training_schedules.*','courses.name','users.username')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->leftJoin('users','users.id','=','training_schedules.trainer_id')
        ->where('course_batches.batch_id',session('user')->batch_id)
        ->whereDate('training_schedules.date','=',Carbon::now())
        ->where('courses.status','active')
        ->get();

        return view("user.trainings.index", compact("todaystrainings","courses"));
    }

    public function show_user_trainings_details($id)
    {

        $trainingschedules = TrainingSchedule::select('training_schedules.*','courses.name','users.username')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->leftJoin('users','users.id','=','training_schedules.trainer_id')
        ->where('course_batches.batch_id',session('user')->batch_id)
        ->where('course_batches.course_id',$id)
        ->get();

        return view("user.trainings.show", compact("trainingschedules"));
       
    }

    public function show_trainer_trainings()
    {

        // dd($courses);

        $upcomingtrainings = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batch_name')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->leftJoin('batches','batches.id','=','course_batches.batch_id')
        ->where('training_schedules.trainer_id','=',session('user')->id)
        ->whereDate('training_schedules.date','>',Carbon::now())
        ->get();

        $todaystrainings = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batch_name')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->leftJoin('batches','batches.id','=','course_batches.batch_id')
        ->where('training_schedules.trainer_id','=',session('user')->id)
        ->whereDate('training_schedules.date','=',Carbon::now())
        ->get();

        $previoustrainings = TrainingSchedule::select('training_schedules.*','courses.name','batches.name as batch_name')
        ->join('course_batches','course_batches.batch_course_id','=','training_schedules.course_batch_id')
        ->leftJoin('courses','courses.id','=','course_batches.course_id')
        ->leftJoin('batches','batches.id','=','course_batches.batch_id')
        ->where('training_schedules.trainer_id','=',session('user')->id)
        ->whereDate('training_schedules.date','<',Carbon::now())
        ->get();



        // dd($todaystrainings);
 
        return view("trainer.trainings.index", compact("upcomingtrainings","todaystrainings","previoustrainings"));
        // dd($trainingschedules);

    }
}
