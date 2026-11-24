<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class CatalogController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('catalog.index', compact('rooms'));
    }

    public function show($id)
    {
        $room = Room::with('reviews.user')->findOrFail($id);
        return view('catalog.show', compact('room'));
    }
}
