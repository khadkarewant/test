<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return back()->withErrors(['email' => 'Invalid Credentials']);
        }

        return redirect('/tasks');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/login');
    }
}
