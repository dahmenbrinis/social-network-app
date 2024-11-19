<div class="py-6">
    <div class="relative w-full ">
        <input type="text" wire:model.live="search" class="w-full p-5 text-lg rounded-full shadow outline-none">
        <svg class="absolute top-0 right-0 w-8 h-8 mx-6 my-4 text-black" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"/>
            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>
    </div>

    <p class="py-4 text-2xl">Suggested Friends :</p>
    <div class="grid grid-cols-3 gap-4 sm:rounded-lg">
        @foreach($suggestedFriends as $user)
            <livewire:friends.friend-card-actions :user="$user"/>
        @endforeach
    </div>
    <div class="m-6 ">
        {{$suggestedFriends->links()}}
    </div>
</div>


