<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        $username = auth()->user()->username;
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye ' . $username);
    }

    public function create()
    {
        return view('sessions.create');

    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' =>'required',
        ]);

        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages(['email' => "Vos credentials ne correspondent pas à ce que nous avons"]);
        }

        //user is logged in car auth()->attempt est quand meme exécuté

        session()->regenerate();
        $username = auth()->user()->username;
        return redirect('/')->with('success', 'Welcome Back ' . $username);


    }
}
