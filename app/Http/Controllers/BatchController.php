<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use App\Models\CourseBatch;
use App\Models\Course;
use App\Models\TrainingSchedule;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $routePrefix = "batches.";
    private $viewFolder = "admin.batches.";

    public function index()
    {
       $batches = Batch::all();
       return view($this->viewFolder . "index", compact("batches"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batches = new Batch();
        $courses= Course::all();
        $selectedcourse=CourseBatch::where('batch_id',$batches->id)->pluck('course_id')->toArray();
        // dd($selectedcourse);
        return view($this->viewFolder . "create", compact("batches","courses","selectedcourse"));
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
            "start_date" => "required",  
        ]);
        $checkbatchid = Batch::where("id", $request->id)->first();
        
        if($checkbatchid!=null)
        {
            return redirect()->route($this->routePrefix . "index")->with("error", "Batch With this id Already exists");

        }
        $batches=new Batch();
        $batches->id=$request->id;
        $batches->name=$request->name;
        $batches->date=$request->start_date;
        $batches->save();

        if(!empty($request->course_id))
        {
            foreach ($request->course_id as $id)
            {
                $coursebatch=new CourseBatch();
                $coursebatch->batch_course_id=$request->id."_".$id;
                $coursebatch->course_id=$id; 
                $coursebatch->batch_id=$request->id;
                $coursebatch->save();
            }
        }

        return redirect()->route($this->routePrefix . "index")->with("success", "Batch created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batches = Batch::where("id", $id)->first();
        $courses=Course::all(); 
        $selectedcourse=CourseBatch::where('batch_id',$batches->id)->pluck('course_id')->toArray();
        return view($this->viewFolder . "show", compact("batches","courses","selectedcourse"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batches = Batch::where("id", $id)->first();
        abort_if(empty($batches), 404);
        $courses=Course::all(); 
        $selectedcourse=CourseBatch::where('batch_id',$batches->id)->pluck('course_id')->toArray();
        return view($this->viewFolder . "edit", compact("batches","courses","selectedcourse"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $batches = Batch::where("id", $id)->first();
        abort_if(empty($batches), 404);

        $request->validate([
            "id" => "required",
            "name" => "required",
            "start_date" => "required",
        ]);
         
        $checkbatchid = Batch::where("id", $request->id)->first();

        if($checkbatchid!=null)
        {
            return redirect()->route($this->routePrefix . "index")->with("error", "Batch With this id Already exists");

        }    
        $coursebatch=CourseBatch::where("batch_id",$id)->first();
        $del=$batches->courses()->delete();  
        
        if(!empty($request->course_id))
        {
          
            foreach ($request->course_id as $ids)
            {
                $coursebatches = new CourseBatch();
                $coursebatches->batch_course_id=$request->id."_".$ids;
                $coursebatches->course_id=$ids;
                $coursebatches->batch_id=$request->id;
                $coursebatches->save();
            }
        } 
        $batches->id=$request->id;
        $batches->name=$request->name;
        $batches->date=$request->start_date;
        $batches->save();

        return redirect()->route($this->routePrefix . "index")->with("success", "Batch updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batches = Batch::where("id", $id)->first();
        abort_if(empty($batches), 404);

        $batches->delete();
        return redirect()->route($this->routePrefix . "index")->with("success", "Batche deleted");
    }
}
