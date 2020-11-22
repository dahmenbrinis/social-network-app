<x-app-layout>
    @can('sendFriendRequest',\App\Models\User::find(3))
        worked
    @endcan
    <div class="w-2/5 container ">
        <div class="w-1/5 m-2 ">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(6)->id"/>
        </div>
        <div class="w-1/5 m-2 ">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(6)->id"/>
        </div>
        <div class="w-1/5 m-2 ">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(6)->id"/>
        </div>
        <div class="w-1/5 m-2 ">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(6)->id"/>
        </div>
        <div class="w-1/5 m-2 ">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(6)->id"/>
        </div>
    </div>
</x-app-layout>
