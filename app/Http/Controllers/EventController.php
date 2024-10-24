<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Level;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('intranet.events.index');
    }

    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();

        return view('intranet.events.create', compact('categories', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'nullable|date',
            'location' => 'required|string',
            'level_id' => 'required|exists:levels,id',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->user_id = auth()->user()->id;
        $event->category_id = $request->category_id;
        $event->level_id = $request->level_id;

        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento creada exitosamente.');
    }

    public function show(Event $event)
    {
        return view('intranet.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        $levels = Level::all();

        return view('intranet.events.edit', compact('event', 'categories', 'levels'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'nullable|date',
            'location' => 'required|string',
            'level_id' => 'required|exists:levels,id',
        ]);

        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->user_id = auth()->user()->id;
        $event->category_id = $request->category_id;
        $event->level_id = $request->level_id;

        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento actualizada exitosamente.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Evento eliminada exitosamente.');
    }
}
