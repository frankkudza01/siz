<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $events = Events::latest()->get();
        $eventCounts = Events::selectRaw('event_type, COUNT(*) as count')
        ->groupBy('event_type')
        ->pluck('count', 'event_type')
        ->all();
        if(view()->exists('client.events.eventsPage'))
        {
            return view('client.events.eventsPage', ['events'=>$events, 'eventCounts'=>$eventCounts]);
        }
    }
}
