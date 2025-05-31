@props([
    'firstname' => auth()->user()?->first_name ?? 'Guest',
    'lastname'  => auth()->user()?->last_name ?? 'o\' Guest',
    'greeting'  => ! Auth::guest() ? 'Yo' : 'Uhm'
])
<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <h1>{{ $greeting }}, <strong>{{ $firstname }} {{ $lastname }}</strong> from Home Page</h1>
</x-layout>

