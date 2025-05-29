<x-layout>
    <x-slot:heading>
        Edit Job: {{ $job->title  }}
    </x-slot:heading>

    <form method="post" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    {{--                    Job title --}}
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input
                                id="title"
                                name="title"
                                type="text"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder="Shift Leader"
                                value="{{ $job->title }}"
                                required
                            >
                        </div>

                        @error('title')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{--                    Salary --}}
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input
                                id="salary"
                                name="salary"
                                type="text"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder="$50,000 per year"
                                value="{{ $job->salary }}"
                                required
                            >
                        </div>

                        @error('salary')
                        <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{--                <div class="mt-10">--}}
                {{--                    @if($errors->any())--}}
                {{--                        <ul>--}}
                {{--                            @foreach($errors->all() as $error)--}}
                {{--                                <li class="italic text-red-500">{{ $error }}</li>--}}
                {{--                            @endforeach--}}
                {{--                        </ul>--}}
                {{--                    @endif--}}
                {{--                </div>--}}
            </div>

        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
{{--                Submit form --}}
                <button form="delete-form" type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Delete</button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>

{{--                Delete form --}}
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </div>
        </div>
    </form>

    <form action="/jobs/{{ $job->id }}" method="post" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
