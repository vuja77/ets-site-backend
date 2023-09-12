<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homework;
class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Homework::all();
       
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
        
            'deadline' => "",
            'description'=> "required"
        ]);
        Homework::create($validated);
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
        Homework::destroy($id);
    }

    public function getHomework(string $id) {
        return Homework::where("homeworks.course_id", "=", $id)
        ->get();
    }
}
