<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePdf;
use App\Models\Batch;
use App\Models\CourseBatch;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $routePrefix = "courses.";
    private $viewFolder = "admin.courses.";

    public function index()
    {
       $courses = Course::all();
       return view($this->viewFolder . "index", compact("courses"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = new Course();
        $batches=Batch::all();
        $selectedbatch=CourseBatch::where('course_id',$courses->id)->pluck('batch_id')->toArray();
        // $selectedoffercode=FitnessOfferCode::where('fitness_uuid',$fitness->uuid)->pluck('offercode_uuid')->toArray();
        return view($this->viewFolder . "create", compact("courses","batches","selectedbatch"));
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
            "id" => "required",
            "name" => "required",
            "status"=>"required",
            "description"=>"required",
            "start_date" => "required",
            "pdf"=>"required",  
        ]);
        // $temp=Course::where('id',$request->id)->first();
        // if(!empty($temp)){
        //     return ;
        // }
        $checkcourseid = Course::where("id", $request->id)->first();
        
        if($checkcourseid!=null)
        {
            return redirect()->route($this->routePrefix . "index")->with("error", "Course With this id Already exists");

        }
        
        $courses=new Course();
        $courses->id=$request->id;
        $courses->name=$request->name;
        $courses->status=$request->status;
        $courses->description=$request->description;
        $courses->start_date=$request->start_date;
        $courses->save();
        // $courses->pdf=$request->pdf;
        // dd($courses);
        // if(!empty($request->batch_id))
        // {
        //     foreach ($request->batch_id as $id)
        //     {
        //         $coursebatch=new CourseBatch();
        //         $coursebatch->course_id= $request->id;
        //         $coursebatch->batch_id=$id;
        //         $coursebatch->save();
        //     }
        // }
        if($request->hasFile("pdf")) {

            $pdfs = $request->file("pdf");
            $pdfCount = 1;
            foreach ($pdfs as $pdf) {
                $filename = $pdfCount++ . "_" . $pdf->getClientOriginalName() . "." . $pdf->getClientOriginalExtension();
                $pdf->move(public_path("Media/PDFs"), $filename);

                $coursepdfs=new CoursePdf();
                $coursepdfs->course_id=$request->id;
                $coursepdfs->pdf = "Media/PDFs/" . $filename;;
                $coursepdfs->save();
            }
        }
        return redirect()->route($this->routePrefix . "index")->with("success", "Course created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = Course::where("id", $id)->first();
        $batches=Batch::all();
        
        $selectedbatch=CourseBatch::where('course_id',$courses->id)->pluck('batch_id')->toArray();
        return view($this->viewFolder . "show", compact("courses","selectedbatch","batches"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::where("id", $id)->first();
        abort_if(empty($courses), 404);
        $batches=Batch::all();
        $selectedbatch=CourseBatch::where('course_id',$courses->id)->pluck('batch_id')->toArray();
        // dd($selectedbatch);
        return view($this->viewFolder . "edit", compact("courses","batches","selectedbatch"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $courses = Course::where("id", $id)->first();
        abort_if(empty($courses), 404);
        
        $request->validate([
            "id" => "required",
            "name" => "required",
            "status"=>"required",
            "description"=>"required",
            "start_date" => "required",
          
        ]);
        
        $checkcourseid = Course::where("id", $request->id)->first();
        
        if($checkcourseid!=null)
        {
            return redirect()->route($this->routePrefix . "index")->with("error", "Course With this id Already exists");

        }
        
        $courses->id=$request->id;
        $courses->name=$request->name;
        $courses->status=$request->status;
        $courses->description=$request->description;
        $courses->start_date=$request->start_date;
       
         

        // $coursebatch= CourseBatch::where("course_id",$id)->first();
        // $coursebatch->course_id=$request->id;
        // $coursebatch->save();
        // $del=$courses->batches()->delete();
          
        // if(!empty($request->batch_id))
        // {
          
        //     foreach ($request->batch_id as $ids)
        //     {
        //         $coursebatchs = new CourseBatch();
        //         $coursebatchs->course_id=$request->id;
        //         $coursebatchs->batch_id=$ids;
        //         $coursebatchs->save();
        //     }
        // }
    
        $coursepdf= CoursePdf::where("course_id",$id)->first();
        $coursepdf->course_id=$request->id;
        $coursepdf->save();
        if($request->hasFile("pdf")) {

            $pdfs = $request->file("pdf");
            $pdfCount = 1;
            foreach ($pdfs as $pdf) {
                $filename = $pdfCount++ . "_" . $pdf->getClientOriginalName() . "." . $pdf->getClientOriginalExtension();
                $pdf->move(public_path("Media/PDFs"), $filename);

                $coursepdfs=new CoursePdf();
                $coursepdfs->course_id=$request->id;
                $coursepdfs->pdf = "Media/PDFs/" . $filename;;
                $coursepdfs->save();
            }
        }
        
        // $courses->pdf=$request->pdf;

        $courses->save();
        return redirect()->route($this->routePrefix . "index")->with("success", "Course updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = Course::where("id", $id)->first();
        abort_if(empty($courses), 404);
        
        
        $courses->courses()->delete(); 
        $courses->pdfs()->delete();
        $courses->delete();

        return redirect()->route($this->routePrefix . "index")->with("success", "Course Deleted");
    }



}
