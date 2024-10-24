<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Level;

class EventController extends Controller
{
    public function index()
    {
        $userLevel = auth()->user()->level_id;
        $levelNA = Level::where('name', 'N/A')->first()->id;

        $events = Event::where(function ($query) use ($userLevel, $levelNA) {
            $query->where('level_id', $userLevel)
                ->orWhere('level_id', $levelNA);
        })->get();

        return view('intranet.students.events.index', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('intranet.students.events.show', compact('event'));
    }
}
