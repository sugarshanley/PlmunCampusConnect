<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('organization')
            ->orderBy('starts_at')
            ->paginate(9);

        return view('events.index', compact('events'));
    }

    public function create()
    {
        $organizations = Organization::orderBy('name')->get();

        return view('events.create', compact('organizations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organization_id' => [
                'required',
                'integer',
                'exists:organizations,id',
            ],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'venue' => ['required', 'string', 'max:255'],
            'starts_at' => ['required', 'date'],
            'capacity' => ['nullable', 'integer', 'min:1'],
            'status' => [
                'required',
                Rule::in(['draft', 'published', 'cancelled']),
            ],
        ]);

        $validated['created_by'] = Auth::id();

        Event::create($validated);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        $organizations = Organization::orderBy('name')->get();

        return view('events.edit', compact('event', 'organizations'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'organization_id' => [
                'required',
                'integer',
                'exists:organizations,id',
            ],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5000'],
            'venue' => ['required', 'string', 'max:255'],
            'starts_at' => ['required', 'date'],
            'capacity' => ['nullable', 'integer', 'min:1'],
            'status' => [
                'required',
                Rule::in(['draft', 'published', 'cancelled']),
            ],
        ]);

        $event->update($validated);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
