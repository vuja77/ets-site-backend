<?php
namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\CoursePassed;
use App\Models\CourseProfessor;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $validated = $request->validate([
            'name' => 'required',
            'thumbnail' => 'required',
            'course_type_id' => 'required',
        ]);

        $Course = Course::create($validated);
        return CourseProfessor::create(["course_id" => $Course->id, "professor_id" => $user->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();

        $Course = Course::join('course_professors', 'courses.id', '=', 'course_professors.course_id')
            ->join("users", "course_professors.professor_id", "=", "users.id")
            ->join('course_types', "courses.course_type_id", "=", "course_types.id")
            ->where("courses.id", $id)->get(["courses.name", "thumbnail", "scorm_filename", "description", "users.first_name", "users.last_name", "course_types.name as type_name"]);

        $Lessons = Lesson::
            where("lessons.course_id", $id)->get(["lessons.*"]);
        $Passed = CoursePassed::
            where([
            ['course_id', '=', $id],
            ['user_id', '=', $user->id],
        ])->get();
        return ["lessons" => $Lessons, "course" => $Course, "passed" => $Passed];

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
       
        $data = array_filter($request->all());
        return Course::where("id", $id)->update($data);
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
            ->join('lessons', 'course.id', '=', 'lessons.course_id')
            ->where("course_takers.class_id", "=", $id)
            ->get(["courses.*", "course_takers.class_id", "users.first_name", "users.last_name", "course_types.name as courseTypeName"], ["lessons.*"]);

    }
    public function getcourseUser(string $id)
    {

        return Course::join('course_takers', 'courses.id', '=', 'course_takers.course_id')
            ->join('users', 'users.class_id', '=', 'course_takers.class_id')
            ->where("courses.id", "=", $id)
            ->get(["users.*"]);

    }
    public function getProfessorCourse()
    {
        $user = Auth::user();

        return Course::join('course_professors', 'courses.id', '=', 'course_professors.course_id')
            ->where("course_professors.professor_id", "=", $user->id)
            ->get(["courses.*"]);

    }
    public function search(string $name)
    {
        return Course::where("name", "like", '%a%')->get();
    }

}
