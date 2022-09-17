<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTrainingSchedulesTableAddNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("training_schedules",function (Blueprint $table){
            $table->string('attendance_status')->nullable()->after("trainer_id");
            
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("training_schedules",function (Blueprint $table){
            $table->dropColumn("status");
            
         });
    }
}
