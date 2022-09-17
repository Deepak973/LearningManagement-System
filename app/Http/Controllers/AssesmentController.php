<?php

namespace App\Http\Controllers;

use App\Models\Assesment;
use Illuminate\Http\Request;
use App\Models\CourseBatch;
use App\Models\Course;
use App\Models\Batch;
use App\Models\assesment_details;


class AssesmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $routePrefix = "assessments.";
    private $viewFolder = "trainer.assessments.";

    public function index()
    {
        $assessments = Assesment::select("courses.name", "batches.name as batch_name","assesments.assessment_id")
        ->join("course_batches","course_batches.batch_course_id","=","assesments.course_batch_id")
        ->join("batches","batches.id","=","course_batches.batch_id")
        ->join("courses","courses.id","=","course_batches.course_id")
        ->where("assesments.created_by",session('user')->id)
        ->distinct()->get();

        // dd($assessments);
        
        return view($this->viewFolder . "index", compact("assessments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assessments = new Assesment();
        $batches=Batch::all();
        $courses= Course::all();
        return view($this->viewFolder . "create", compact("batches","courses","assessments"));
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
            "batch_name" => "required",
            "course_name" => "required",
            "desc" => "required",
            "as_name" =>"required",
            "question" => "required",
            "op1" => "required",
            "op2" => "required",
            "op3" => "required",
            "op4" => "required",
            "answer" => "required",          

        ]);
       
      
        
        $b_c_id = CourseBatch::where("course_id",$request->course_name)
        ->where("batch_id",$request->batch_name)->first();

        $assesment_id = $b_c_id->batch_course_id."_".$request->as_name;

        $description = $request->desc;
        $question =$request->question;
        $op1=$request->op1;
        $op2=$request->op2;
        $op3=$request->op3;
        $op4=$request->op4;
        $answer=$request->answer;
       
        $assesment = new Assesment();
        $assesment->course_batch_id = $b_c_id->batch_course_id;
        $assesment->assessment_id =$assesment_id;
        $assesment->assessment_desc = $description;
        $assesment->created_by = session('user')->id;
        $assesment->save();

        foreach($question as $i =>$qs)
        {
            $assesment_details = new assesment_details();
            $assesment_details->assessment_id =$assesment_id;
            $assesment_details->question = $question[$i];
            $assesment_details->op1 =$op1[$i];
            $assesment_details->op2 =$op2[$i];
            $assesment_details->op3 =$op3[$i];
            $assesment_details->op4 =$op4[$i];
            $assesment_details->answer =$answer[$i];
            $assesment_details->save();

        }
        return redirect()->route($this->routePrefix . "index")->with("success", "Assessment Created");
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $assessments = assesment_details::select("assesment_details.*","assesments.assessment_desc")
        ->join("assesments","assesments.assessment_id","=","assesment_details.assessment_id")
        ->where("assesment_details.assessment_id","=",$id)->get();
        // dd( $assessments);

        return view($this->viewFolder . "show", compact("assessments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assessments = assesment_details::select("assesment_details.*","assesments.assessment_desc","courses.name as course_name","courses.id as course_id", "batches.name as batch_name","batches.id as batch_id")
        ->join("assesments","assesments.assessment_id","=","assesment_details.assessment_id")
        ->join("course_batches","course_batches.batch_course_id","=","assesments.course_batch_id")
        ->join("batches","batches.id","=","course_batches.batch_id")
        ->join("courses","courses.id","=","course_batches.course_id")
        ->where("assesment_details.assessment_id",$id)->get();
        // dd($assessments);
         
        $batches=Batch::all();
        $courses= Course::all();
        $selectedbatch=CourseBatch::where('batch_id',$assessments[0]->batch_id)->distinct()->pluck('batch_id')->toArray();
        // dd($selectedcourse);
        $selectedcourse=CourseBatch::where('course_id',$assessments[0]->course_id)->distinct()->pluck('course_id')->toArray();
        // dd($selectedbatch);
        return view($this->viewFolder . "edit", compact("assessments","batches","courses","selectedcourse","selectedbatch"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $assesment = Assesment::where("assessment_id", $id)->get();
        abort_if(empty($assesment), 404);

        $request->validate([
            "id"=>"required",
            "batch_name" => "required",
            "course_name" => "required",
            "desc" => "required",
            "assessment_id" => "required", 
            "question" => "required",
            "op1" => "required",
            "op2" => "required",
            "op3" => "required",
            "op4" => "required",
            "answer" => "required", 
                    

        ]);
        //   dd($request->all());
        //for removing removed questions
        $c=0;
        $removedata=null;
        $flag=0;
        foreach($request->all_ids as $alld)
        {
            foreach($request->id as $i)
            {
              if($alld==$i)
              {
                 $flag=1;
              }
            }
            if($flag==0)
            {
            $removedata[$c] = $alld;
            $c++;
            }
            $flag=0;

        }
        // dd($request->all_ids,$request->id,$removedata);
        
        if($removedata!=null) 
        {
            foreach($removedata as $rm)
            {
                $removedata = assesment_details::where("id",$rm);
                $removedata->delete();
            }
        }
        
        
        // dd($request->all());
        $b_c_id = CourseBatch::where("course_id",$request->course_name)
        ->where("batch_id",$request->batch_name)->first();

        $assesment_id = $request->assessment_id;
        $description = $request->desc;
        $question =$request->question;
        $op1=$request->op1;
        $op2=$request->op2;
        $op3=$request->op3;
        $op4=$request->op4;
        $answer=$request->answer;
        $idlength=count($request->id);
        $count=0;
        // dd($b_c_id);
        // dd( $request->original_assessment_id);
        $assesment = Assesment::where("assessment_id", $request->original_assessment_id)->first();
        $assesment->course_batch_id = $b_c_id->batch_course_id;
        $assesment->assessment_id =$assesment_id;
        $assesment->assessment_desc = $description;
        $assesment->created_by = session('user')->id;
        $assesment->save();



        foreach($question as $i =>$qs)
        {
            if($count<$idlength)
            {
            $assesment_details = assesment_details::where("id",$request->id[$i])->first();
            $assesment_details->assessment_id= $assesment_id;
            $assesment_details->question = $question[$i];
            $assesment_details->op1 =$op1[$i];
            $assesment_details->op2 =$op2[$i];
            $assesment_details->op3 =$op3[$i];
            $assesment_details->op4 =$op4[$i];
            $assesment_details->answer =$answer[$i];
            $assesment_details->save();
            $count++;
            }

            else
            {
            $assesment_details = new assesment_details();
            $assesment_details->assessment_id =$assesment_id;
            $assesment_details->question = $question[$i];
            $assesment_details->op1 =$op1[$i];
            $assesment_details->op2 =$op2[$i];
            $assesment_details->op3 =$op3[$i];
            $assesment_details->op4 =$op4[$i];
            $assesment_details->answer =$answer[$i];
            $assesment_details->save();

            }
            

        }
        return redirect()->route($this->routePrefix . "index")->with("success", "Assessment updated");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assessment = Assesment::where("assessment_id", $id)->get();
        abort_if(empty($assessment), 404);
        //  dd($id);
         $assessment = Assesment::where("assessment_id", $id)->delete();
       
        return redirect()->route($this->routePrefix . "index")->with("success", "Assessment deleted");
    }
}
