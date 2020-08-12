<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
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
        dd($request->all());
        Event::create($request->all());

        return redirect()->route('events.index');
    }

    public function edit(Event $event)
    {
        $recurrencies = Event::RECURRENCIES;
        return view('events.form', compact('recurrencies', 'event'));
    }
}
