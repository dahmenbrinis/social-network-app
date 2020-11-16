<div class="py-6">
    <div class="w-full relative  ">
        <input type="text" wire:model="search" class="w-full p-5 text-lg rounded-full shadow outline-none">
        <svg class="absolute right-0 top-0 my-4 mx-6 h-8 w-8 text-black" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
    </div>

    <p class="text-2xl py-4">Suggested Friends :</p>
    <div class="sm:rounded-lg grid grid-cols-1 gap-4">
        @foreach($suggestedFriends as $user)
            <x-friends-card :user="$user" wire:key="{{$user->id}}">
                <x-slot name="rightSide">
                    <button wire:click="addFriend({{$user->id}})"
                            class="px-6 py-4 h-12 group font-semibold rounded-lg text-lg bg-white text-green-600 shadow-md flex items-center ">
                        <p class=" text-black group-hover:text-green-500 transition duration-200">add friend</p>
                        <svg class="h-full pl-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </button>
                </x-slot>
            </x-friends-card>
        @endforeach
    </div>
    <div class="m-6 ">
        {{$suggestedFriends->links()}}
    </div>

    <p class="text-2xl py-4">Friends List :</p>
    <div class="sm:rounded-lg grid grid-cols-1 gap-4">
        @foreach($friends as $user)
            <x-friends-card :user="$user" wire:key="{{$user->id}}">
                <x-slot name="rightSide">
                    <button wire:click="removeFriend({{$user->id}})"
                            class="px-6 py-4 group h-12 font-semibold rounded-lg text-lg bg-white text-red-400 shadow-md flex items-center ">
                        <p class=" text-black group-hover:text-red-400 transition duration-200">Remove friend</p>
                        <svg class="h-full pl-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                    </button>
                </x-slot>
            </x-friends-card>
        @endforeach
    </div>
    <div class="m-6">
        {{$friends->links()}}
    </div>
</div>


