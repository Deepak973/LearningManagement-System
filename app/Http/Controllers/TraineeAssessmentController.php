<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assesment;
use App\Models\Assesment_marks;
use App\Models\assesment_details;

class TraineeAssessmentController extends Controller
{
    
    private $viewFolder = "user.assesments.";

    public function show_trainee_assessments()
    {

        $assessments = assesment_details::select("courses.name", "batches.name as batch_name","assesment_details.assessment_id","assesments.assessment_desc")
        ->join("assesments","assesments.assessment_id","=","assesment_details.assessment_id")
        ->join("course_batches","course_batches.batch_course_id","=","assesments.course_batch_id")
        ->join("batches","batches.id","=","course_batches.batch_id")
        ->join("courses","courses.id","=","course_batches.course_id")
        ->join("users","users.batch_id","=","batches.id")
        ->where("users.id",session('user')->id)
        ->distinct()->get();

        // $selectedcourse=CourseBatch::where('batch_id',$batches->id)->pluck('course_id')->toArray();
        $status = Assesment_marks::where("assesment_marks.trainee_id",session('user')->id)
        ->distinct()->pluck('assesment_marks.assessment_id')->toArray();

        // dd($assessmentss);         
       return view($this->viewFolder . "index", compact("assessments","status"));
    }

    public function give_assessments($id)
    {
        // dd($id);
        $assessments = assesment_details    ::where("assessment_id","=",$id)->get();
        // dd( $assessments);

        return view($this->viewFolder . "giveassessment", compact("assessments"));
        // dd("hello");
    }

    public function store_marks(Request $request)
    {
        // dd($request->all());
        
        $request->validate([
            "question" => "required",
            "answer" => "required",  
        ]);
        $marks=0;
        foreach($request->question as $i => $q)
        {
        $ans="option".$i;
        // dd($request->answer[$i] ,$request->$ans[0]);
        if($request->answer[$i]==$request->$ans[0])
        {     
        $marks++;
        }
        }


        $assesment_marks=new Assesment_marks();
        $assesment_marks->assessment_id =$request->assesment_id;
        $assesment_marks->trainee_id =session('user')->id;
        $assesment_marks->total_marks =$request->total_marks;
        $assesment_marks->obtained_marks = $marks;
        $assesment_marks->save();

        return redirect()->route("show_trainee_assessments")->with("success", "Batch created");
    }

    public function show_trainee_marks()
    {

        $assessments = Assesment_marks::select("courses.name", "assesment_marks.assessment_id","assesment_marks.total_marks","assesment_marks.obtained_marks")
        ->join("assesments","assesments.assessment_id","=","assesment_marks.assessment_id")
        ->join("course_batches","course_batches.batch_course_id","=","assesments.course_batch_id")
        ->join("batches","batches.id","=","course_batches.batch_id")
        ->join("courses","courses.id","=","course_batches.course_id")
        ->where("assesment_marks.trainee_id",session('user')->id)
        ->distinct()
        ->get();


        // dd($assessments);         
       return view($this->viewFolder . "result", compact("assessments"));
    }
}
