<div>
    <input type="text" wire:model="search" class="w-full my-4 p-2">
    <div>
        <div class="sm:rounded-lg grid grid-cols-1 gap-4">
            @foreach($suggestedFriends as $user)
                {{--                <livewire:friends.friends-card :user="$user" :key="$user->id"/>--}}
                <x-friends-card :user="$user" wire:key="{{$user->id}}"></x-friends-card>
            @endforeach
        </div>
        <div class="m-6 ">
            {{$suggestedFriends->links()}}
        </div>
    </div>
</div>
