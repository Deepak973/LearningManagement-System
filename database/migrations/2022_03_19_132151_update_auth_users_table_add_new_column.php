<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAuthUsersTableAddNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("auth_users",function (Blueprint $table){
           $table->string('user_type')->after("email");
           $table->string('batch_id')->nullable()->after("user_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table("auth_users",function (Blueprint $table){
            $table->dropColumn(["user_type","batch_id"]);
        });
    }
}
