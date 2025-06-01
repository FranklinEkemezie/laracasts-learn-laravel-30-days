<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="mt-4 space-y-4">
        @foreach($jobs as $job)
            <a href="jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 bg-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year.
                </div>
                <div class="text-sm text-end flex justify-between mt-4">
                    <p>Created on <strong>{{ $job->created_at->toDateTimeString() }}</strong></p>
                    <p>Updated on <strong>{{ $job->updated_at->toDateTimeString() }}</strong></p>
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
