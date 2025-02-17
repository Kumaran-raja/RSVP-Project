<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2 class="mb-4">Upcoming Events</h2>

@foreach($events as $event)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $event->name }}</h5>
            <p class="card-text">{{ $event->date->format('Y-m-d H:i') }}</p>
        </div>
    </div>
@endforeach

<a href="{{ route('register.form') }}" class="btn btn-success">Sign Up</a>
<a href="{{ route('login.form') }}" class="btn btn-info">Login</a>
</body>
</html>
