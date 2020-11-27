<div class="py-6">
    <div class="relative w-full ">
        <input type="text" wire:model="search" class="w-full p-5 text-lg rounded-full shadow outline-none">
        <svg class="absolute top-0 right-0 w-8 h-8 mx-6 my-4 text-black" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
    </div>

    <p class="py-4 text-2xl">Suggested Friends :</p>
    <div class="grid grid-cols-1 gap-4 sm:rounded-lg">
        @foreach($suggestedFriends as $user)
            <x-friends-card :user="$user" wire:key="{{$user->id}}">
                <x-slot name="rightSide">
                    <button wire:click="addFriend({{$user->id}})"
                            class="flex items-center h-12 px-6 py-4 font-semibold text-teal-400 bg-white shadow group ">
                        <p class="text-black transition duration-200 group-hover:text-teal-400">add friend</p>
                        <svg class="h-full pl-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </button>
                </x-slot>
            </x-friends-card>
            <div class="w-full border-b"></div>
        @endforeach
    </div>
    <div class="m-6 ">
        {{$suggestedFriends->links()}}
    </div>

    <p class="py-4 text-2xl">Friends List :</p>
    <div class="grid grid-cols-1 gap-4 sm:rounded">
        @foreach($friends as $user)
            <x-friends-card :user="$user" wire:key="{{$user->id}}">
                <x-slot name="rightSide">
                    <button wire:click="removeFriend({{$user->id}})"
                            class="flex items-center h-12 px-6 py-4 font-semibold text-red-400 bg-white shadow group ">
                        <p class="text-black transition duration-200 group-hover:text-red-400">Remove friend</p>
                        <svg class="h-full pl-2 " viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="8.5" cy="7" r="4"/>
                            <line x1="23" y1="11" x2="17" y2="11"/>
                        </svg>
                    </button>
                </x-slot>
            </x-friends-card>
            <div class="w-full border-b"></div>
        @endforeach
    </div>
    <div class="m-6">
        {{$friends->links()}}
    </div>
</div>


