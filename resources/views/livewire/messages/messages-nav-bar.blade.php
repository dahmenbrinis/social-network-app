<div x-data="{isOpen : false}">
    <div class="fixed bottom-0 right-0 z-0 flex flex-col flex-col-reverse w-1/5 h-full ">
        {{--       todo fill this space with somthing--}}
        <div x-show="isOpen" class="flex flex-col-reverse pt-6 bg-white divide-y shadow-md"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="transform opacity-0 scale-y-0"
             x-transition:enter-end="transform opacity-100 scale-y-100"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="transform opacity-100 scale-y-100"
             x-transition:leave-end="transform opacity-0 scale-y-0"
        >
            <div class="flex justify-between mt-6 bg-red-200 rounded-sm shadow-md ">

                <input class="w-full h-full p-4 font-bold bg-gray-50 text-md ring-4 ring-blue-100" type="text"
                       placeholder="Search">
            </div>
            @foreach($users as $user )
                <div class="flex items-center py-2 cursor-pointer">
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
        <div @click="{isOpen = !isOpen}" class="px-4 py-2 text-lg font-semibold bg-gray-200 shadow cursor-pointer">
            Chat
        </div>
    </div>
</div>
