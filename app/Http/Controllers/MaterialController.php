<?php

namespace App\Http\Controllers;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Material::all();
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
      // $image_name = time().'.'.$request->image->extension();  
        //$request->image->move(public_path('uploads'), $image_name)
        $files = [];
        $lesId = $request->input("lesson_id");
        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $file_name = $file->getClientOriginalName()/*time().rand(1,99).'.'.$file->extension()*/;  
                $file->move(storage_path('app/public/uploads'), $file_name);
                Material::create([
                    "lesson_id"=>$lesId,
                    "file_path"=> $file_name,
                    "post_content"=> "vuvu"
                ]);
                $files[]['name'] = $file_name;
            }
        }
        $validated = $request->validate([
            "lesson_id" => "",
            "file_path" => "",
            "url" => "",
            "post_content" => "",
       ]);  
       
        
       
      
      
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
        Material::destroy($id);

    }

    public function getMaterial(string $id) {
        //return Material::where("lesson_id", $id)->get();
        
       // return Material::all()->where("lesson_id", $id);


        return Material::join("lessons", "materials.lesson_id", "=", "lessons.id")
        ->join("courses", "lessons.course_id", "=", "courses.id")
        ->where("courses.id", "=", $id)
        ->get("materials.*");
    }

    public function Download(string $name) {
        $file = storage_path()."\app/public/uploads/".$name;
        return response()->download($file);
    }
   
}
