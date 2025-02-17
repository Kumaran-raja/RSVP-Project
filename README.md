<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
# Laravel Livewire Event and RSVP Application

This project is a simple Laravel application with Livewire installed, allowing users to create events and RSVP to them. It demonstrates the use of Livewire components for managing form submissions, validation, and events in real-time.

## Features
- **Event Creation**: Admin can create events with details like name, description, and date.
- **RSVP**: Users can RSVP to events, with event details being stored in the database.
- **Validation**: Ensures that input data is validated before saving.
- **Error Handling**: Displays validation error messages if the input is invalid.

## Installation Instructions

### Prerequisites

Make sure you have the following installed on your machine:
- **PHP** (preferably PHP 8.0 or higher)
- **Composer** (for managing PHP dependencies)
- **Laravel** (already installed during setup)
- **MySQL** or any other database for storing event and RSVP data

### Step-by-Step Setup

1. **Clone the Repository**:

   Clone the repository to your local machine using Git:

   ```bash
   git clone https://github.com/Kumaran-raja/RSVP-Project

2.Navigate to the Project Directory:

Go into the project directory:

    cd your-repository-name
3.Install Dependencies:

Install the required Composer dependencies:

    composer install
4.Create .env File:

Copy the .env.example file to .env:

    cp .env.example .env

5.Generate Application Key:

Run the following command to generate the application key:

    php artisan key:generate

6.Set Up the Database:

Configure your .env file with your database connection details. Here’s an example of how to set it up for MySQL:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

run the migrations:

    php artisan migrate

7.Run the Application:

Start the local development server:

    php artisan serve
The application will be available at http://127.0.0.1:8000.

Application Structure
Livewire Components:

EventCreate: Used for creating events.
EventRsvpCreate: Used for RSVP functionality.
Models:

Event: Represents the event details.
EventRsvp: Represents a user's RSVP to an event.
Routes:

/events: Displays a list of events.
/events/create: The form for creating events.
/rsvp: The form to RSVP to an event.

License
This project is licensed under the MIT License.

