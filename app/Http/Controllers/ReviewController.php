<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $application = Application::findOrFail($request->application_id);

        if ($application->user_id != Auth::id() || $application->status != 'Завершено')
            {
                abort(403, 'Вы не можете оставить отзыв на эту заявку.');
            }

            Review::create([
                'user_id' => Auth::id(),
                'application_id' => $application->id,
                'text' => $request->text,
            ]);

            return back()->with('success', 'Отзыв успешно добавлен!');
    }
}
