<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Create Event</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="container mt-5">
<h2 class="mb-4">Create a New Event</h2>

<form action="{{ route('events.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="event_name" class="form-label">Event Name</label>
        <input type="text" class="form-control" id="event_name" name="name" required>
    </div>

    <div class="mb-3">
        <label for="event_date" class="form-label">Event Date</label>
        <input type="datetime-local" class="form-control" id="event_date" name="date" required min="{{ now()->format('Y-m-d\TH:i') }}">
    </div>

    <button type="submit" class="btn btn-primary">Create Event</button>
</form>

<hr>

<h3>Upcoming Events</h3>
<ul class="list-group">
    @foreach($events as $event)
        <li class="list-group-item">
            <strong>{{ $event->name }}</strong> - {{ $event->date->format('Y-m-d H:i') }}
        </li>
    @endforeach
</ul>
</body>
</html>
