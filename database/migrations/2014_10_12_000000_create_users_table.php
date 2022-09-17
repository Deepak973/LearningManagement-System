<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            // $table->timestamp('email_verified_at')->nullable();
            $table->text('password');
            $table->string('gender');
            $table->string('phone_no');
            $table->text('address');
            $table->string('user_type');
            $table->enum('status', ["1","0"])->default("0");
            $table->string('profile_pic');
            $table->string('batch_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
