<?php

namespace App\Http\Controllers;

use App\Models\testing;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    
    $query = testing::query();

    if ($request->filled('search_name')) {
        $query->where(function ($q) use ($request) {
            $q->where('first_name', 'like', '%' . $request->search_name . '%')
            ->orWhere('last_name','like', '%' . $request->search_name . '%');
            
        });
    }

    if ($request->filled('search_email')) {
        $query->where('email', 'like', '%' . $request->search_email . '%');
    }

    $users = $query->get();

    return view('user.index', compact('users'));
}


    public function show( $id)
    {
         $user = testing::findOrFail($id);
    return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
{
    $user = testing::findOrFail($id);
    return view('user.edit', compact('user'));
}

// Update user
public function update(Request $request, $id)
{
    $user = testing::findOrFail($id);
    $user->update($request->all());
    return redirect()->route('users.index')->with('success', 'User updated successfully!');
}
    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $user = testing::findOrFail($id);
    $user->delete();
    return redirect()->route('users.index')->with('success', 'User deleted successfully!');
}
}
