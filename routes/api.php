<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::post('login', [Controllers\UserController::class, 'login']);
Route::post('register', [Controllers\UserController::class, 'register']);
Route::get('a', function () {
    return "not authenticated";
})->name("a");
Route::resource('classes', Controllers\ClassController::class);
Route::resource('types', Controllers\CourseTypeController::class);
Route::resource('ed_programs', Controllers\EdProgramController::class);
Route::get('getcourse/{id}', [Controllers\CourseController::class, 'getcourse']);
Route::get('getcourseUser/{id}', [Controllers\CourseController::class, 'getcourseUser']);

Route::resource('courseProfessor', Controllers\CourseProfessorController::class);

Route::resource('courseTracker', Controllers\CourseTakerController::class);
Route::resource('scorm', Controllers\ScormDataController::class);
Route::post('set-value', [Controllers\ScormDataController::class, 'setValue']);
Route::get('get-value/{course_id}', [Controllers\ScormDataController::class, 'getValue']);
Route::get('gethomeworkUpload/{id}/{myid}', [Controllers\HomeworkUploadController::class, 'gethomeworkUpload']);
Route::post('upload-scorm-course', [Controllers\ScormDataController::class, 'uploadCourse']);

Route::resource('lesson', Controllers\LessonController::class);
Route::resource('Material', Controllers\MaterialController::class);
Route::get('getMaterial/{id}', [Controllers\MaterialController::class, "getMaterial"]);
Route::get('getlesson/{id}', [Controllers\LessonController::class, 'getLessonByCourse']);
Route::get('getclass/{id}', [Controllers\ClassController::class, 'getClass']);
Route::get('download/{name}', [Controllers\MaterialController::class, 'Download']);
Route::get('search/{name}', [Controllers\CourseController::class, 'search']);

Route::resource('homework', Controllers\HomeworkController::class);
Route::get('gethomework/{id}', [Controllers\HomeworkController::class, 'gethomework']);
Route::get('gethomeworkUpload/{id}/{myid}', [Controllers\HomeworkUploadController::class, 'gethomeworkUpload']);
Route::get('generateCert', [Controllers\CertController::class, 'generatePDF']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('details', [Controllers\UserController::class, 'details'])->name("details");
    Route::resource('course', Controllers\CourseController::class);
    Route::get('getProfessorCourse', [Controllers\CourseController::class, 'getProfessorCourse']);
    Route::post("send-mail", [Controllers\MaliController::class, 'send']);

});
