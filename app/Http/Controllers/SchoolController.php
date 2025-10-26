<?php

namespace App\Http\Controllers;

use App\Models\school;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = school::all(); 
        return view("school.index",compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view("school.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);
    school::create($validated);
    return redirect()->route('school.index')->with('success', 'School created successfully!');

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
        $data = school::findOrFail($id); 
        return view("school.edit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
        ]);
        $school = school::findOrFail($id);
        $school->update($validated);
        
        return redirect()->route('school.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $school = School::findOrFail($id);
        $school->delete();

        return redirect()->route('school.index');
    }
}
