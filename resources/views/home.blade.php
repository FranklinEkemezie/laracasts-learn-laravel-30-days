@props([
    'greeting'  => 'Yo',
    'name'      => 'Ifeanyi'
])
<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <h1>{{ $greeting }}, <strong>{{ $name }}</strong> from Home Page</h1>
</x-layout>

