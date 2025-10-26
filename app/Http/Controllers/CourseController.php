<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\school;
use App\Models\teacher;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = course::all(); 
        return view("course.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school = school::all(); 
        return view("course.create", compact("school")) ; 

    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'school_id' => 'required|exists:schools,id',
        'teacher_id' => [
            'required',
            'exists:teachers,id',
            function ($attribute, $value) use ($request) {
                $teacher = teacher::find($value);
                if ($teacher && $teacher->school_id != $request->school_id) {
                    throw \Illuminate\Validation\ValidationException::withMessages([
                        'teacher_id' => 'This teacher does not belong to the selected school.',
                    ]);
                }
            }
        ],
    ]);

    course::create($validated);

    return redirect()->route('course.index');
}

    public function getTeachers($id){
        // $data = teacher::where("school_id",$id)->select("id","name")->get(); 
        // return response()->json($data); 
        $data =school::find($id)->getTeachers()->select("id","name")->get() ; 
        return response()->json($data);

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
        $school = school::all() ; 
        $course= course::findOrFail($id) ; 
        return view("course.edit", compact("school","course"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validate= $request->validate([
            "name"=>"required",
            "school_id"=>"required",
            "teacher_id"=>"required"
        ]);
        $course= course::findOrFail($id); 
        $course->update($validate); 
        return redirect()->route("course.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $course =course::findOrFail($id); 
       $course->delete(); 
       return redirect()->route("course.index");
    
    }
}
