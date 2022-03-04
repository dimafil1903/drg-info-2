<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 container">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">

            @include('pages.users.create')
        </div>

    </div>
    <div class="py-12 items-center justify-center">
        @include('pages.users.list')
    </div>
</x-app-layout>
