<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScormData;
class ScormDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ScormData::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "course_id" => "",
            "user_id" => "",
            "data" => "",
          
       ]); 
       
        ScormData::create($validated);
    }
    public function setValue(Request $request)
    {
        $validated = $request->validate([
            "course_id" => "",
            "user_id" => "",
            "data" => "",
          
       ]); 
       $course_id = $request->input('course_id');
       $id = $request->input('user_id');
        if(ScormData::where("course_id", "=", $course_id)->where("user_id", "=", $id)->exists()) {
            ScormData::where("course_id", "=", $course_id)->where("user_id", "=", $id)->update(["data" => $request->input("data")]);
        } else {
            ScormData::create($validated);
        }
       
       
    }
    public function getValue(string $course_id, string $id)
    {
        
      
        return ScormData::where("course_id", "=", $course_id)->where("user_id", "=", $id)->get();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
