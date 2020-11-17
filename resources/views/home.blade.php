<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-gray-100  w-3/5 mx-auto sm:px-6 lg:px-8">
            {{--            <livewire:friends.friends-list />--}}
            {{--            <livewire:friends.friends-suggestion-list :key="suggestion"/>--}}
            <livewire:friends.index/>
        </div>
    </div>
</x-app-layout>

