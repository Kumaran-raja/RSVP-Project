<div>
    <h2 class="text-2xl font-bold mb-4">Create a New Event</h2>

    <form action="{{ route('events.store') }}" method="POST" class="mb-8">
        @csrf
        <div class="mb-4">
            <label for="event_name" class="block text-sm font-medium text-gray-700">Event Name</label>
            <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="event_name" name="name" required>
        </div>

        <div class="mb-4">
            <label for="event_date" class="block text-sm font-medium text-gray-700">Event Date</label>
            <input type="datetime-local" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="event_date" name="date" required min="{{ now()->format('Y-m-d\TH:i') }}">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Create Event
        </button>
    </form>

    <!-- Event Messages -->
    @if (isset($message['success']))
        <div class="bg-green-500 text-white p-2 rounded mb-2">{{ $message['success'] }}</div>
    @endif
    @if (isset($message['error']))
        <div class="bg-red-500 text-white p-2 rounded mb-2">{{ $message['error'] }}</div>
    @endif

    <!-- Upcoming Events List -->
    <h3 class="text-xl font-bold mt-4">Upcoming Events</h3>
    <ul class="mt-4">
        @foreach($events as $event)
            <li class="border-b p-3 flex justify-between items-center">
                <div>
                    <strong>{{ $event->name }}</strong> <br>
                    <small>{{ $event->date->format('F d, Y') }}</small> <br>
                    <span class="text-gray-600">Attendees: {{ $event->attendees_count }}</span>
                </div>

                <div>
                    @if(auth()->check())
                        @if($rsvpStatus[$event->id] ?? false)
                            <button wire:click="withdrawRsvp({{ $event->id }})" class="bg-red-500 text-white px-3 py-1 rounded">
                                Withdraw RSVP
                            </button>
                        @else
                            <button wire:click="rsvp({{ $event->id }})" class="bg-blue-500 text-white px-3 py-1 rounded">
                                RSVP
                            </button>
                        @endif

                        @if(auth()->user()->role === 'admin')
                            <button wire:click="removeEvent({{ $event->id }})" class="bg-gray-500 text-white px-3 py-1 rounded ml-2">
                                Delete Event
                            </button>
                        @endif
                    @else
                        <span class="text-gray-500">Login to RSVP</span>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
