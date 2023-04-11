<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::all()->sortBy("title");

        return view('event.index', [
            'events' => $event,
        ]);
    }
}
