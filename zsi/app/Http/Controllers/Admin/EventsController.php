<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $events = Events::latest()->get();
        if(view()->exists('admin.events.eventsPage'))
        {
            return view('admin.events.eventsPage', ['events'=>$events]);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'type' => 'required|in:physical,virtual',
            'venue' => 'nullable|string|max:255',
            'virtual_link' => 'nullable|string|max:255',
            'meeting_id' => 'nullable|string|max:255',
            'passcode' => 'nullable|string|max:255',
            'category' => 'required|in:free,paid',
            'description' => 'nullable|string',
            'event_type' => 'required|string',
        ]);

        // Handle theme image upload
        $themePath = null;
        if ($request->hasFile('theme')) {
            $themePath = $request->file('theme')->store('events/themes', 'public');
        }

        Events::create(array_merge($request->all(), ['theme' => $themePath]));

        return redirect()->route('/admin/events/')->with('success', 'Event created successfully.');
    }


    public function update(Request $request, $id)
    {
        $event = Events::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'theme' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required|date_format:H:i',
            'type' => 'required|in:physical,virtual',
            'venue' => 'nullable|string|max:255',
            'virtual_link' => 'nullable|string|max:255',
            'meeting_id' => 'nullable|string|max:255',
            'passcode' => 'nullable|string|max:255',
            'category' => 'required|in:free,paid',
            'description' => 'nullable|string',
            'event_type' => 'required|string',
        ]);

        // Update event details
        $event->update($request->except('theme'));

        // Handle theme image update
        if ($request->hasFile('theme')) {
            // Delete old theme image if exists
            if ($event->theme) {
                Storage::disk('public')->delete($event->theme);
            }
            $themePath = $request->file('theme')->store('events/themes', 'public');
            $event->update(['theme' => $themePath]);
        }

        return redirect()->route('/admin/events/')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Events::findOrFail($id);

        // Delete event theme image if exists
        if ($event->theme) {
            Storage::disk('public')->delete($event->theme);
        }

        $event->delete();

        return redirect()->route('/admin/events/')->with('success', 'Event deleted successfully.');
    }
}
