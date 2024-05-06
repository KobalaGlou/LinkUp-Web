<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    @if (session('success')||session('error'))
    <div>
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mt-6 mb-6 text-center">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
