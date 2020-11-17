<x-jet-dropdown align="right" :width="'w-64'">
    <x-slot name="trigger">
        <button wire:click="notificationSeen"
                class="inline-flex relative text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
            <svg class="h-6 w-6 text-indigo-500" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            @if($notificationCount )
                <span class="relative inline-flex rounded-md shadow-sm">
                    <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                      <span
                          class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-300 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-red-400"></span>
                    </span>
                </span>
            @endif
        </button>
    </x-slot>

    <x-slot name="content">
        <div class=" px-4 py-2 text-xs ">
            @forelse($friendRequests as $user)
                <x-friends-card :user="$user" :size="'h-7 w-7'">
                    <x-slot name="rightSide">
                        <button wire:click="accept({{$user->id}})"
                                class="px-2 p-1 h-7 font-semibold bg-white text-green-500 flex items-center hover:animate-pulse border border-gray-200">
                            <p>accept</p>
                            <svg class="h-full ml-1 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 4v16m8-8H4"/>
                            </svg>
                        </button>

                    </x-slot>
                </x-friends-card>
                <div class="w-full border-b my-2"></div>
            @empty
                No friend request to show
            @endforelse
        </div>
    </x-slot>
</x-jet-dropdown>
