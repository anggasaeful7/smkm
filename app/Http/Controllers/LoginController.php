<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Regsiter'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $user->assignRole('umum');
        $user->givePermissionTo('nav umum');

        return redirect()
            ->route('login')
            ->with('success', 'Sukses! Data Pengguna Berhasil Disimpan');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
