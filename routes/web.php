<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingScheduleController;
use App\Http\Controllers\ShowTrainingController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AssesmentController;
use App\Http\Controllers\TraineeAssessmentController;



//user login page
Route::get('/', function () {
    return view('user.login');
});

Route::resource("users", UserController::class);

Route::post('users/register',[UserController::class, 'register'])->name('users.register');

Route::post('users/verifyotp',[UserController::class, 'verifyotp'])->name('users_verifyotp');


//admin login page
Route::get('/admin', function () {
    return view('admin.adminlogin');
});

Route::post("admin/login",[AdminController::class, 'adminlogin'])->name('admin_login');


//dashboard routes
Route::get('admin/admindashboard',[AdminController::class, 'admindashboard'])->name('admin_dashboard');

Route::get('trainer/dashboard',[UserController::class, 'trainerdashboard'])->name('trainer_dashboard');

Route::get('user/dashboard',[UserController::class, 'dashboard'])->name('user_dashboard');







// ................................Admin..............................//


//for User Authorization routes

Route::resource("authusers", AuthController::class);

//for Batch routes

Route::resource("batches", BatchController::class);

//for Course routes

Route::resource("courses", CourseController::class);

// for schedule trainig routes

Route::resource("trainingschedules", TrainingScheduleController::class);

//for dropdown course in training scheduling

Route::post("admin/getcourse",[TrainingScheduleController::class, 'get_course'])->name('get_course');

//..........................................................................//




//..................................User.............................................................................//

//for course routes

Route::get('user/course',[UserController::class, 'showcourse'])->name('showcourse');

//for trainigschedule routes

Route::get('user/training',[ShowTrainingController::class, 'show_user_trainings'])->name('show_user_trainings');

Route::get('user/trainingdetails/{id}',[ShowTrainingController::class, 'show_user_trainings_details'])->name('show_user_trainings_details');

//for attendance routes

Route::get('user/attendance',[AttendanceController::class, 'show_trainee_attendance'])->name('show_trainee_attendance');

Route::get('user/assessments',[TraineeAssessmentController::class, 'show_trainee_assessments'])->name('show_trainee_assessments');

Route::get('user/give_assessments/{id}',[TraineeAssessmentController::class, 'give_assessments'])->name('give_assessments');

Route::post('user/give_assessments',[TraineeAssessmentController::class, 'store_marks'])->name('store_marks');

Route::get('user/assessments_marks',[TraineeAssessmentController::class, 'show_trainee_marks'])->name('show_trainee_marks');







//................................................................................................................//



//..................................Trainer.............................................................................//

Route::get('trianer/trainingschedules',[ShowTrainingController::class, 'show_trainer_trainings'])->name('show_trainer_trainings');

Route::resource("attendances", AttendanceController::class);

Route::get('trainner/attendances/show/{batch}/{id}',[AttendanceController::class, 'show'])->name('show_trainee_list');

//for assessments routes

Route::resource("assessments", AssesmentController::class);

//................................................................................................................//




//for logout
Route::get('/logout', function () {
    
    if(session()->has('admin')){
        Session::flush();
        return redirect("/admin");
    }
    else{
        Session::flush();
        return redirect("/");
    }
})->name('logout');