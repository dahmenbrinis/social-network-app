<div x-data="{isOpen : true}" class="">
    <div
        class="fixed bottom-0  left-0 grid z-50  grid-rows-1 xl:grid-cols-4 lg:grid-cols-4 grid-cols-1 w-full  md:mx-none  md:grid-cols-2 px-4 gap-x-2">
        @foreach($usersChatTabs as $key => $user)
            @if($key < 5 )
                <livewire:messages.index :user="$user" :key="'chat-'. $user"/>
            @endif
        @endforeach
    </div>
    <div @click="{isOpen = !isOpen}"
         class="  max-h-screen bg-red-primary bg-opacity-90 text-gray-50 px-4 py-3 text-lg font-bold bg-gray-300 shadow-md ">
        Chat
    </div>
    <div x-show="isOpen" class=" flex h-full flex-col bg-white divide-y shadow"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-y-0"
         x-transition:enter-end="transform opacity-100 scale-y-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="transform opacity-100 scale-y-100"
         x-transition:leave-end="transform opacity-0 scale-y-0"
    >

        @foreach($users as $user )
                <div wire:click="openChatTab('{{$user->id}}')" class="flex items-center py-2 cursor-pointer">
                    <div class="relative px-2 mr-2">
                        @if($user->state)
                            <span
                                class="absolute right-0 w-4 h-4 bg-green-200 border-4 border-white rounded-full "></span>
                            <span
                                class="absolute right-0 w-4 h-4 bg-green-200 border-4 border-white rounded-full animate-pulse"></span>
                        @endif
                        <button class="w-10 overflow-hidden rounded-full shadow">
                            <img class="object-cover object-center " src="{{$user->profile_photo_url}}" alt="">
                        </button>
                    </div>
                    <p class="font-semibold text-md">{{$user->name}}</p>
                </div>
            @endforeach

        </div>

</div>
    {{--    {{dump($usersChatTabs)}}--}}

</div>
