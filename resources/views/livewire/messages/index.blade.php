<div x-data="{isOpen:true}" class="flex flex-col-reverse">

    <div x-show="isOpen" @scroll.window="isOpen=(window.pageYOffset <= 260) && isOpen"
         class="flex flex-col-reverse shadow-md bg-gray-50 h-96"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-y-50 "
         x-transition:enter-end="transform opacity-100 scale-y-100 "
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="transform opacity-100 scale-y-100"
         x-transition:leave-end="transform opacity-0 scale-y-50"
    >


        <form wire:submit.prevent="message" class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4">

            <div class="flex-grow ">
                <div class="relative w-full">
                    <input wire:model="messageBox"
                           type="text"
                           class="flex w-full border rounded-xl focus:outline-none focus:border-red-300 pl-4 h-10"
                    />
                </div>
            </div>
            <div class="ml-4">
                <button wire:submit.prevent="message"
                        class="flex items-center justify-center bg-red-primary hover:bg-red-primary rounded-xl text-white px-4 py-1 flex-shrink-0">
                    <span>Send</span>
                    <span class="ml-2">
                        <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </form>
        <div class="flex flex-col h-full overflow-x-auto mb-4">
            <div class="flex flex-col h-full">
                <div class="grid grid-cols-12 gap-y-2">
                    @foreach($messages as $message )
                        @if($message->sender == Auth::id())
                            <div class="col-start-2 col-end-13 p-3 rounded-lg">
                                <div class="flex items-center justify-start flex-row-reverse">
                                    <div
                                        class="flex items-center justify-center  overflow-hidden h-10 w-10 rounded-full  flex-shrink-0">
                                        <img class="object-cover object-center "
                                             src="{{Auth::user()->profile_photo_url}}" alt="">
                                    </div>
                                    <div class="relative mr-3 text-sm bg-red-100 py-2 px-4 shadow rounded-xl">
                                        <div>
                                            {{$message->content}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-start-1 col-end-10 p-3 rounded-lg">
                                <div class="flex flex-row items-center">
                                    <div
                                        class="flex items-center justify-center  overflow-hidden h-10 w-10 rounded-full  flex-shrink-0">
                                        <img class="object-cover object-center "
                                             src="{{Auth::user()->profile_photo_url}}" alt="">
                                    </div>
                                    <div class="relative mr-3 text-sm bg-red-100 py-2 px-4 shadow rounded-xl">
                                        <div>
                                            {{$message->content}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div
        class="relative  flex items-center justify-center max-h-full py-2 font-semibold text-justify text-red-500 bg-gray-50 rounded shadow cursor-pointer text-md">
        <div @click="{isOpen = !isOpen}" class="">
            {{$user->name}}
        </div>
        <button wire:click="closeChatTab"
                class="absolute right-0 p-1 px-3 ring-red-100 text-red-primary ring-1 text-xl  font-semibold  rounded-sm hover:bg-red-primary aspect-w-1 aspect-h-1 hover:text-white">
            X
        </button>
    </div>
</div>
