<div>
    <input type="text" wire:model="search" class="w-full my-4 p-2">
    <div>
        <div class="sm:rounded-lg grid grid-cols-4 gap-4">
            @foreach($friends as $key => $user)
                {{--                <livewire:friends.friends-card :user="$user" :key="$user->id"/>--}}
                {{--                @if($key == 0)--}}
                {{--                    {{dd($user->profile_photo_url)}}--}}
                {{--                @endif--}}
                <livewire:friends.friend-card-actions :user="$user" wire:key="{{$user->id}}"/>
            @endforeach
        </div>
        <div class="m-6 ">
            {{$friends->links()}}
        </div>
    </div>
</div>
