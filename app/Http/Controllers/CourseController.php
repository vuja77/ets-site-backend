<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Course;


use App\Models\Coursetaker;
use App\Models\CourseProfessor;
use App\Models\User;
use App\Models\Lesson;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Course::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'thumbnail' => 'required',
            'course_type_id' => 'required',
        ]);

       $Course = Course::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
      /* $Lesson = Lesson::join("courses", "lessons.course_id", "=", "courses.id")
        ->where("courses.id", "=", $id)
        ->get(["lessons.name", "lessons.section", "lessons.id", "courses.thumbnail"]);*/

       $Course= Course::where("id", $id)->get(["name", "thumbnail"]);
       return $Course;
    }

   


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getcourse(string $id)
    {
     
        return Course::join('course_takers', 'courses.id', '=', 'course_takers.course_id')
        ->join('course_types', 'courses.course_type_id', '=', 'course_types.id')
        ->join('course_professors', 'courses.id', '=', 'course_professors.course_id')
        ->join('users', 'users.id', '=', 'course_professors.professor_id')
        ->where("course_takers.class_id", "=",$id)
        ->get(["courses.*", "course_takers.class_id", "users.first_name", "users.last_name", "course_types.name as courseTypeName"]);
    
       
    }

    public function search(string $name) {
        return Course::where("name", "like", '%a%')->get();
    }

}
