<?php

namespace App\Http\Controllers;

use App\Models\testing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class Signupcontroller extends Controller
{
    public function create()
    {
        return view("signup.create");
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'last_name' => 'required|string|max:10',
        'first_name' => 'required|string|max:10',
        'email' => 'required|email|unique:testings,email',
        'password' => 'required|min:4',
        'password_confirmation'=>'required|same:password',
        'gender' => 'required|in:male,female',
    ]);

    // Save data to database
    $testing = new testing();
    $testing->last_name = $validated['last_name'];
    $testing->first_name = $validated['first_name'];
    $testing->email = $validated['email'];
    $testing->gender = $validated['gender'];
    $testing->password =Hash::make($validated['password']); 
    $testing->save();

    return redirect()->back()->with('success', 'Hello ' . $validated['first_name'] . ' ' . $validated['last_name'] . '!');
}

   
}
