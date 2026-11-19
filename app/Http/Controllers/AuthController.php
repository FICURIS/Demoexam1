<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AuthorizationRequest;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'role_id' => 1,
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'surname' => $request->surname,
            'name' => $request->name,
            'middlename' => $request->middlename,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('login')->with('success', 'Регистрация прошла успешно! Теперь войдите в систему.');
    }

    public function showLogin()
    {
        return view('auth.authorization');
    }

    public function login(AuthorizationRequest $request)
    {
        $credentials = $request->only('login', 'password');
        
        if (Auth::attempt($credentials))
            {
                $request->session()->regenerate();

                if(Auth::user()->role_id == 2)
                    {
                        return redirect()->route('admin.applications');
                    }

                return redirect()->route('applications.index');
            }

        return back()->withErrors([
            'login' => 'Неверный логин или пароль.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }  
}
