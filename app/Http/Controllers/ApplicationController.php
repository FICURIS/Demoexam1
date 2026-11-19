<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ApplicationRequest;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('user_id', Auth::id())->with('room')->get();

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        $rooms = Room::all();
        return view('applications.create', compact('rooms'));
    }

    public function store(ApplicationRequest $request)
    {
        Application::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'date' => $request->date,
            'payment' => $request->payment,
            'status' => 'Новая',
        ]);

        return redirect()->route('applications.index')->with('success', 'Заявка успешно отправлена на рассмотрение!');
    }
}
