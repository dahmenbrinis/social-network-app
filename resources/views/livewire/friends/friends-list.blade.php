<div>
    <div class="relative">
        <input type="text" wire:model="search" class="w-full text-md  rounded my-4 p-3" placeholder="Search">
    </div>
    <div>
        <div class="sm:rounded-lg grid grid-cols-3 gap-4">
            @foreach($friends as $key => $user)
                <livewire:friends.friend-card-actions :user="$user" wire:key="{{$user->id}}"/>
            @endforeach
        </div>
        <div class="m-6">
            {{$friends->links()}}
        </div>
    </div>
</div>
