<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventRsvp;
use Illuminate\Support\Facades\Auth;

class EventList extends Component
{
    public $events;
    public $rsvpStatus = [];
    public $message;

    public function mount()
    {
        $this->loadEvents();
    }

    // Fetch events with attendee count
    public function loadEvents()
    {
        $this->events = Event::withCount('attendees')->get();

        if (Auth::check()) {
            $userId = Auth::id();
            foreach ($this->events as $event) {
                $this->rsvpStatus[$event->id] = EventRsvp::where('user_id', $userId)
                    ->where('event_id', $event->id)
                    ->exists();
            }
        }
    }

    // RSVP for an event
    public function rsvp($eventId)
    {
        if (!Auth::check()) {
            $this->message = ['error' => 'You must be logged in to RSVP.'];
            return;
        }

        $userId = Auth::id();
        EventRsvp::firstOrCreate(['user_id' => $userId, 'event_id' => $eventId]);

        $this->rsvpStatus[$eventId] = true;
        $this->message = ['success' => 'RSVP confirmed successfully.'];
        $this->loadEvents(); // Live update
    }

    // Withdraw RSVP
    public function withdrawRsvp($eventId)
    {
        if (!Auth::check()) {
            $this->message = ['error' => 'You must be logged in to withdraw RSVP.'];
            return;
        }

        EventRsvp::where('user_id', Auth::id())->where('event_id', $eventId)->delete();
        $this->rsvpStatus[$eventId] = false;
        $this->message = ['success' => 'RSVP withdrawn successfully.'];
        $this->loadEvents(); // Live update
    }

    // Remove Event (Admin Feature)
    public function removeEvent($eventId)
    {
        if (!Auth::check()) {
            $this->message = ['error' => 'You must be logged in to remove an event.'];
            return;
        }

        // Optional: Check if the user is an admin before deleting
        if (Auth::user()->role !== 'admin') {
            $this->message = ['error' => 'Only admins can remove events.'];
            return;
        }

        Event::findOrFail($eventId)->delete();
        $this->message = ['success' => 'Event removed successfully.'];
        $this->loadEvents(); // Live update
    }

    public function render()
    {
        return view('livewire.event-list');
    }
}
