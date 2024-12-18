<div>
    <form wire:submit="save"
          class="mt-3 flex justify-between items-center
            @error('content')border-2 border-red-400 @enderror">
        @csrf
        <div class="flex-grow mr-12  ">
            <input wire:model.live.blur="content" placeholder="Add comment"
                   class="w-full h-full focus:outline-none  border-l ml-4"
                   type="text">
        </div>
        @error('content')
        <div class="text-red-500 font-hairline">{{$message}}</div>
        @enderror
        <div class="flex">
            <button class=" p-2 " type="submit">
                <i class="flex flex-wrap items-center group">
                    <svg wire:loading class="animate-spin -ml-1 h-5 w-5 text-red-500"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <svg wire:loading.remove class="group-hover:text-red-300 iniline h-5 w-5 text-red-500"
                         viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"/>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                    </svg>
                </i>
            </button>
        </div>
    </form>
</div>
