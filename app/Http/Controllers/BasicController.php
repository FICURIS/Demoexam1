<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\AuthorizationRequest;

use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function register()
    {
        return view('static.register');
    }

    public function authorization()
    {
        return view('static.authorization');
    }

    public function requests()
    {
        return view('static.requests');
    }

    public function create_requests()
    {
        return view('create_requests');
    }

    public function submit_register(RegisterRequest $request)
    {
        $data = $request->validated();
    }

    public function submit_authorization(AuthorizationRequest $request)
    {
        $data = $request->validated();
    }
}
