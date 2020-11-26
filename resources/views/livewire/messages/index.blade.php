<div x-data="{isOpen:true}">
    <div @click="{isOpen = !isOpen}"
         class="flex items-center justify-center h-full py-2 font-semibold text-justify text-red-500 bg-white rounded shadow cursor-pointer ralative text-md">
        <div class="">
            {{$user->name}}
        </div>
    </div>
    <div x-show="isOpen" class="flex flex-col-reverse shadow-md bg-gray-50 h-96"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-y-0"
         x-transition:enter-end="transform opacity-100 scale-y-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="transform opacity-100 scale-y-100"
         x-transition:leave-end="transform opacity-0 scale-y-0"
    >
        <div class="flex justify-between mt-6 bg-red-200 rounded-sm shadow-md ">
            <form wire:submit.prevent="message"
                  class="w-full h-full p-2 font-bold bg-gray-50 text-md ring-4 ring-blue-100">
                <input wire:model="messageBox" type="text" placeholder="Message">
            </form>

        </div>

        <div class="px-2 overflow-y-auto divide-y-8 ">
            @foreach($messages as $message )
                {{--                {{dd($message->sender)}}--}}
                @if($message->sender == Auth::id())
                    <div class="float-right w-10/12 px-2 py-2 bg-red-500 rounded-br-none opacity-75 rounded-xl">
                        <p class="font-semibold text-white break-words text-md">{{$message->content}}</p>
                    </div>
                @else
                    <div class="float-left w-10/12 px-2 py-2 bg-white rounded-bl-none shadow rounded-xl">
                        <p class="font-semibold text-black break-words text-md">{{$message->content}}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</div>
