<?php

namespace App\Http\Controllers;

use App\Models\ScormData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            "scorm_filename" => "required",
            "data" => "",
        ]);

        $scorm_filename = $request->input('scorm_filename');
        $id = $request->user()->id;
      
        if (ScormData::where("scorm_filename", "=", $scorm_filename)->where("user_id", "=", $id)->exists()) {
            ScormData::where("scorm_filename", "=", $scorm_filename)->where("user_id", "=", $id)->update(["data" => $request->input("data")]);
        } else {
            ScormData::create(["scorm_filename" => $request-input("scorm_filename"), "data" => $request->input("data")]);
        }
    }
    public function getValue(string $course_id, Request $request)
    {
        return ScormData::where("course_id", "=", $course_id)->where("user_id", "=", $request->user()->id)->get();
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

    public function uploadCourse(Request $request)
    {
        $file = $request->file('file');
        $id = $request->input('id');
        if ($file) {
            $file_name_noext = time() . rand(1, 99);
            $file_name = $file_name_noext . '.' . $file->extension();
            $file->move(storage_path('app/public/courses'), $file_name);

            $zip = new \ZipArchive();
            echo $file_name;
            $res = $zip->open(storage_path('app/public/courses/') . $file_name);

            if ($res === true) {
                $zip->extractTo(storage_path('app/public/courses/') . $file_name_noext);
                $zip->close();
                File::delete(storage_path('app/public/courses/') . $file_name);

                Course::where("id", "=", $id)->update(['scorm_filename' => $file_name_noext]);

            } else {
                return response()->json([
                    "success" => false,
                    "message" => "extract failed",
                ]);
            }

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
            ]);
        } else {
            return response()->json([
                "success" => false,
                "message" => "File missing",
            ]);
        }
    }
}
