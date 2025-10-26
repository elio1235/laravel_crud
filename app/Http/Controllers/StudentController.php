<?php

namespace App\Http\Controllers;

use App\Models\school;
use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= student::all();
        return view("student.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $school = school::all();
        return view("student.create",compact("school"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
             'name' => 'required|string|max:255',
             'school_id'=>'required'
        ]);
        student::create($validate);
        return redirect()->route("student.index");
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
        $student = student::findOrFail($id); 
        $school = school::all() ; 
        return view("student.edit", compact("student","school"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $validate = $request->validate([
             'name' => 'required|string|max:255',
             'school_id'=>'required'
        ]);
        $student= student::findOrFail($id);
        $student->update($validate);
        return redirect()->route("student.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=student::findOrFail($id); 
        $data->delete(); 
        return redirect()->route("student.index") ; 
    }
}
