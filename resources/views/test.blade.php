<x-app-layout>
    @can('sendFriendRequest',\App\Models\User::find(3))
        worked
    @endcan
    <div class="container grid w-2/5 grid-cols-3 gap-4">
        <div class="h-full">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(6)->id"/>
        </div>
        <div class="h-full">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(7)->id"/>
        </div>
        <div class="h-full">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(3)->id"/>
        </div>
        <div class="h-full">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(9)->id"/>
        </div>
        <div class="h-full">
            <livewire:friends.friend-card-actions :user="\App\Models\User::find(10)->id"/>
        </div>
    </div>
</x-app-layout>
