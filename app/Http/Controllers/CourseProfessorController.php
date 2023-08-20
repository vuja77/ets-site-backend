<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseProfessor;

class CourseProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CourseProfessor::all();
    }
    public function getcourseProfessor(Request $request)
    {
       
        return CourseProfessor::all()->whereIn("course_id", $request->get("course_id"));
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
            'professor_id' => 'required',
            'course_id' => 'required',
        ]);

        $CourseProfessor = CourseProfessor::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CourseProfessor::find($id);
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
        $validated = $request->validate([
            'professor_id' => 'required',
            'course_id' => 'required',
        ]);

        $CourseProfessor = CourseProfessor::where("id", $id)->update($validated);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseProfessor::destroy($id);
    }
}
