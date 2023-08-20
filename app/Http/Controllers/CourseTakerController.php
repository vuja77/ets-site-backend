<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseTracker;
class CourseTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CourseTracker::all();
    }
    public function getCourseId(string $id)
    {
        return CourseTracker::where('class_id', $id)
        ->pluck('course_id')
        ->all('course_id');
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
            'student_id' => "",
            'class_id' => "",
            'course_id' => "",
        ]);
        $CourseTracker = CourseTracker::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CourseTracker::find($id);
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
        $CourseTracker = CourseTracker::where("id", $id)->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CourseTracker::destroy($id);

    }
}
