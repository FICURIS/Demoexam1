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

    public function create(Request $request)
{
    $rooms = Room::all();
    $selectedRoomId = $request->query('room_id');
    return view('applications.create', compact('rooms', 'selectedRoomId'));
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
