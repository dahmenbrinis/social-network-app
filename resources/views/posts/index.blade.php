<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-gray-100  w-full xl:w-2/3 mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                {{--                <test-component></test-component>--}}
                <livewire:posts.create/>
                <livewire:posts.index/>
                {{--                    @break--}}

            </div>

        </div>
    </div>
</x-app-layout>

