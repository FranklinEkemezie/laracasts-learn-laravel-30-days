<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="post" action="/register">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

{{--                    First Name --}}
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" required />
                        </div>
                        <x-form-error name="title" />
                    </x-form-field>

                    {{--                    Last Name --}}
                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" required />
                        </div>
                        <x-form-error name="last_name" />
                    </x-form-field>

                    {{--                    Email --}}
                    <x-form-field>
                        <x-form-label for="first_name">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" required />
                        </div>
                        <x-form-error name="email" />
                    </x-form-field>

                    {{--                    Password --}}
                    <x-form-field>
                        <x-form-label for="first_name">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" type="password" required />
                        </div>
                        <x-form-error name="password" />
                    </x-form-field>

                    {{--                    Confirm Password --}}
                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" type="password" required />
                        </div>
                        <x-form-error name="password_confirmation" />
                    </x-form-field>
                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form-button type="submit">Save</x-form-button>
        </div>
    </form>

</x-layout>
