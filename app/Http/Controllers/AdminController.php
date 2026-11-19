<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StatusUpdateRequest;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role_id !=2)
            {
                abort(403, 'Доступ запрещен');
            }

        $query = Application::with(['user', 'room']);

        if ($request->has('status') && $request->status != '')
            {
                $query->where('status', $request->status);
            }

        $applications = $query->get();

        return view('admin.index', compact('applications'));
    }

    public function updateStatus(StatusUpdateRequest $request, $id)
    {
        if (Auth::user()->role_id !=2)
            {
                abort(403);
            }
        
        $application = Application::findOrFail($id);
        $application->update(['status' => $request->status]);

        return back()->with('success', 'Статус заявки обновлен.');
    }
}
