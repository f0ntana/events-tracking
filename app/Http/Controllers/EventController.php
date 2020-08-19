<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $recurrencies = Event::RECURRENCIES;
        return view('events.form', compact('recurrencies'));
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect()->route('events.index');
    }

    public function edit(Event $event)
    {
        $recurrencies = Event::RECURRENCIES;
        return view('events.form', compact('recurrencies', 'event'));
    }

    public function update(Request $request, Event $event)
    {
        $event->update($request->all());
        $event->save();
        return redirect()->route('events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
