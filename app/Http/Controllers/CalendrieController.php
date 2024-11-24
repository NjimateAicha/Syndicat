<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Residence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class CalendrieController extends Controller
{
    public function index(Request $request)
    {
        // Get residence_id from the query parameter
        $residence_id = $request->query('residence_id');

        // Fetch residence by the provided residence_id
        if ($residence_id) {
            $residence = Residence::findOrFail($residence_id);
        } else {
            abort(404, 'Residence not found.');
        }

        return $this->getEvents($residence);
    }



    // Store a new event
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'note' => 'nullable|string',
            'residence_id' => 'exists:residences,id'
        ]);

        // Create the event with the validated data
        $event = Event::create($validatedData);
        // dd($event);

        // Return the newly created event as JSON (for FullCalendar)
        // return response()->json($event);
        return redirect()->back()->with('success', 'Residence added successfully!');
    }
    public function show(Residence $residence)
    {
        return $this->getEvents($residence, true);
    }

    public function getEvents(Residence $residence = null, $view = false)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // Super Admin and Admin can view events for any residence
        if (Auth::user()->hasAnyRole(['Super Admin', 'Admin'])) {
            // If residence is passed, get events for that residence, otherwise get all events
            // $events = $residence ? Event::where('residence_id', $residence->id)->get() : Event::all();
            // dd($residence->id);
            $events = Event::where('residence_id', $residence->id)->get();
            // dd($events);

            $residence_id = $residence->id;
        } else {
            // Regular users can only view events for their own residence
            $residence_id = Auth::user()->residence_id;

            // If a residence is passed, make sure it matches the user's residence
            if ($residence && $residence->id != $residence_id) {
                abort(403, 'Unauthorized access to this residence.');
            }

            // Fetch events for the user's residence
            $events = Event::where('residence_id', $residence_id)->get();
        }
        // dd($events);
        // Return data as JSON or view, based on the request
        if ($view) {
            return view('Event.index1111111', [
                'event' => $events ?? null,
                'residence' => $residence_id
            ]);
        }

        return response()->json($events);
    }

    public function fetchEventsByDate(Request $request)
    {
        // Validate the incoming request for date and optional residence_id
        $validatedData = $request->validate([
            'date' => 'required|date',
            'residence_id' => 'nullable|integer|exists:residences,id' // Validate residence_id if provided
        ]);

        // Get the date from the request
        $date = Carbon::parse($validatedData['date']);

        // Use the provided residence_id or fallback to the user's residence_id
        $residence_id = $validatedData['residence_id'];

        // Fetch events for the specified date and residence_id
        $events = Event::where('residence_id', $residence_id)
            ->where(function ($query) use ($date) {
                $query->whereDate('start', '<=', $date)
                    ->whereDate('end', '>=', $date);
            })
            ->get();

        // Format the start and end times for the fetched events
        foreach ($events as $event) {
            $event->formatted_start = \Carbon\Carbon::parse($event->start)->format('H:i');
            $event->formatted_end = \Carbon\Carbon::parse($event->end)->format('H:i');
        }

        // Return events as JSON
        return response()->json($events);
    }


    // Update an existing event
    public function update(Request $request)
    {
        // Validate the update request data
        // dd($request->all());
        $validatedData = $request->validate([
            'event_id' => 'required|integer|exists:events,id', // Ensure the ID exists in the events table
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'note' => 'nullable|string',
            'residence_id' => 'exists:residences,id'
        ]);

        // Retrieve the event using the provided ID
        $event = Event::findOrFail($validatedData['event_id']); // Use findOrFail to get the event or throw a 404

        // Update the event with the validated data
        $event->update($validatedData);

        return redirect()->back()->with('success', 'Event updated successfully!'); // Changed message to be more relevant
    }


    // Delete an event
    public function destroy(Event $event)
    {
        // Delete the event from the database
        $event->delete();

        // Return a successful response with no content
        return response()->json(null, 204);
    }
}
