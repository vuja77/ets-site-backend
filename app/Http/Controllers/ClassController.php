<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\CourseTaker;

class ClassController extends Controller
{
    public function index()
    {
        return ClassModel::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        return ClassModel::find($id);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
    public function getClass(string $id) {
        return  CourseTaker::join("course_professors", "course_takers.course_id", "=" ,"course_professors.course_id")
        ->join("classes", "course_takers.class_id", "=", "classes.id")
      //  ->join("course_professors", "course_takers.class_id", "=" ,"course_professors.course_id")
      ->join("courses", "course_professors.course_id", "=" ,"courses.id")
       ->where("course_professors.professor_id", "=", $id)
       ->get(["classes.name", "courses.name as course_name", "course_professors.professor_id", "courses.id"]);
     
    }
}
