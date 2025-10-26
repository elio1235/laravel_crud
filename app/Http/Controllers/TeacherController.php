<?php

namespace App\Http\Controllers;

use App\Models\school;
use App\Models\teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = teacher::all(); 
        return view("teacher.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school = school::all(); 
        return view("teacher.create",compact("school"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required',
            'school_id'=>'required'
        ]);
        teacher::create($validate);
        return redirect()->route("teacher.index");
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
        $school = school::all(); 
        $teacher = teacher::findOrFail($id); 
        return view("teacher.edit", compact("school","teacher")); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate= $request->validate([
            "name"=>"required",
            "school_id"=>"required"
        ]);
        $teacher= teacher::findOrFail($id); 
        $teacher->update($validate); 
        return redirect()->route("teacher.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher =teacher::findOrFail($id); 
       $teacher->delete(); 
       return redirect()->route("teacher.index");
    }
}
