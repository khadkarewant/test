<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{   
    public function create() 
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'string|required|max:255',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect('/tasks');
    }

    
}
