@props([
    'firstname' => auth()->user()?->first_name ?? 'Guest',
    'lastname'  => auth()->user()?->last_name ?? 'o\' Guest',
    'greeting'  => ! Auth::guest() ? 'Yo' : 'Uhm'
])
<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>
    <h1 class="mb-4">{{ $greeting }}, <strong>{{ $firstname }} {{ $lastname }}</strong> from Home Page</h1>
    <div class="mt-4 space-y-4">
        @foreach($jobs as $job)
            <a href="jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 bg-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year.
                </div>
                <div class="text-sm text-end flex justify-between mt-4">
                    <p>Created on <strong class="text-brand">{{ $job->created_at->toDateTimeString() }}</strong></p>
                    <p>Updated on <strong class="text-brand">{{ $job->updated_at->toDateTimeString() }}</strong></p>
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>

