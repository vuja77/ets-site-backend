<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Lesson;
class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return Lesson::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => "required",
            'course_id' => "required",
            'section'=> "required"
        ]);
        Lesson::create($validated);
        return Lesson::all("id")->last();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Lesson::where("id", "=", $id)->get();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Lesson::where("id", "=", $id)->update($request->all());
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Lesson::destroy($id);
    }

    public function getLessonByCourse(string $id) {
        return Lesson::where("course_id", "=", $id)
        ->get(["name", "lessons.section","lessons.hide", "lessons.id", "lessons.created_at"]);
        
    }

 
}
