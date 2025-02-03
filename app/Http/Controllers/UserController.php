<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Get all users
        return view('admin.petugas.petugas', compact('users'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Ensure password confirmation
            'lvl' => 'required|in:petugas',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'lvl' => $request->lvl,
        ]);
    
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }
}
