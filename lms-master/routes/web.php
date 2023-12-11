<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdminClassController;
use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\MediaCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CareerOpptunityController;
use App\Http\Controllers\CoreTeamController;
use App\Http\Controllers\CurriculumsController;

Route::get('/', function () {
    return view('home');
});

Route::get('home', [homeController::class, 'index']);

Route::resource('/academic', AcademicYearController::class);
Route::resource('/year', YearController::class);
Route::resource('/class', AdminClassController::class);
Route::resource('/subject', SubjectController::class);

// kyawntharr
Route::resource('/mediacategories', MediaCategoryController::class);
Route::resource('/posts', PostController::class);
Route::resource('/careeropptunity', CareerOpptunityController::class);
// end



//saihtoolwin
Route::resource('/alert',AlertController::class);
Route::resource('/coreteam',CoreTeamController::class);
Route::resource('/curriculum',CurriculumsController::class);