<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCourseBatchesTableAddNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("course_batches",function (Blueprint $table){
            $table->string('batch_course_id')->after("id");
            
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("course_batches",function (Blueprint $table){
            $table->dropColumn("batch_course_id");
        });
    }
}
