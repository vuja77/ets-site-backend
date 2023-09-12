<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('class-model', 'ClassModelCrudController');
    Route::crud('course', 'CourseCrudController');
    Route::crud('course-professor', 'CourseProfessorCrudController');
    Route::crud('course-taker', 'CourseTakerCrudController');
    Route::crud('ed-program', 'EdProgramCrudController');
    Route::crud('lesson', 'LessonCrudController');
    Route::crud('material', 'MaterialCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('homework', 'HomeworkCrudController');
    Route::crud('homework-upload', 'HomeworkUploadCrudController');
}); // this should be the absolute last line of this file