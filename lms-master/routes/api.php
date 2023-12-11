<?php

use App\Http\Controllers\FrontendApi\AlertController;
use App\Http\Controllers\FrontendApi\CareerController;
use App\Http\Controllers\FrontendApi\CoreTeamController;
use App\Http\Controllers\FrontendApi\CurriculumController;
use App\Http\Controllers\FrontendApi\MediaCategoryController;
use App\Http\Controllers\FrontendApi\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Media Category
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [MediaCategoryController::class, 'index'])->name('allCategories');
    Route::post('/create', [MediaCategoryController::class, 'store'])->name('createCategory');
    Route::get('/{id}', [MediaCategoryController::class, 'show'])->name('showCategory');
    Route::patch('/{id}/edit', [MediaCategoryController::class, 'update'])->name('editCategory');
    Route::delete('/{id}/destroy', [MediaCategoryController::class, 'destroy'])->name('destroyCategory');
});

// Career Opportunity
Route::group(['prefix' => 'careeropportunity'], function () {
    Route::get('/', [CareerController::class, 'index'])->name('allCareer');
    Route::post('/create', [CareerController::class, 'store'])->name('createCareer');
    Route::get('/{id}', [CareerController::class, 'show'])->name('showCareer');
    Route::patch('/{id}/edit', [CareerController::class, 'update'])->name('editCareer');
    Route::delete('/{id}/destroy', [CareerController::class, 'destroy'])->name('destroyCareer');
});

// Post Create
Route::group(['prefix' => 'posts'], function () {
    Route::get('/', [PostController::class, 'index'])->name('posts');
    Route::post('/create', [PostController::class, 'store'])->name('createPost');
    Route::get('/{id}', [PostController::class, 'show'])->name('showPost');
    Route::patch('/{id}/edit', [PostController::class, 'update'])->name('editPost');
    Route::delete('/{id}/destroy', [PostController::class, 'destroy'])->name('destroyPost');
    Route::get('/{id}/mediacategory', [PostController::class, 'getPostbyMedia'])->name('getPostbyMedia');
    Route::get('/mediacategory/{name}', [PostController::class, 'PostbyMediaName'])->name('PostbyMediaName');
});

// alert
Route::group(['prefix' => 'alert'], function () {
    Route::get('/', [AlertController::class, 'index'])->name('alert');
});

//coreteam
Route::group(['prefix' => 'coreteam'], function () {
    Route::get('/', [CoreTeamController::class, 'index'])->name('coreteam');
    Route::get('/{id}', [CoreTeamController::class, 'show'])->name('showpost');
});

// curriculum
Route::group(['prefix' => 'curriculum'], function () {
    Route::get('/', [CurriculumController::class, 'index'])->name('curriculum');
    Route::get('/{id}', [CurriculumController::class, 'show'])->name('showpost');
});
