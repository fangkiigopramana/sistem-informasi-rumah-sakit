<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        // dd('masuk');
        DB::insert('INSERT INTO  users(name, username, email, password) VALUES(? ,?, ?, ?)',[
            $validatedData['name'],
            $validatedData['username'],
            $validatedData['email'],
            $validatedData['password'],
        ]);
        // User::create($validatedData);

        return redirect('/login')->with('success', 'Yee, Registrasi Berhasil!!');
    }
}
