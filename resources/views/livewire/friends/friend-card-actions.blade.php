<div>
    <div class="friend-list-view">
        <!-- profile picture end -->
        <div class="profile-thumb ">
            <a href="#" class="w-full h-full">
                <figure class="profile-thumb-middle">
                    <img src="{{$user->profile_photo_url}}" alt="profile picture">
                </figure>
            </a>
        </div>
        <!-- profile picture end -->
        <div class="posted-author px-2">
            <h6 class="author"><a href="profile.html">{{$user->name}}</a></h6>
            {{--                todo make this buttons responsive on phone --}}
            <div class="py-2">
                @can('acceptFriendRequest',$user)
                    <button wire:click="acceptInvitation"
                            class="frnd-btn bg-red-500 p-1 px-3 m-1 text-md hover:bg-gray-900 hover:text-white  opacity-75">
                        Accept
                    </button>
                @endcan
                @can('denyFriendRequest',$user)
                    <button wire:click="denyInvitation"
                            class="frnd-btn bg-gray-200 p-1 px-3 m-1 text-md hover:bg-gray-900 hover:text-white  opacity-75">
                        Deny
                    </button>
                @endcan
                @can('sendFriendRequest',$user)
                    <button wire:click="sendInvitation"
                            class="frnd-btn bg-red-500 p-1 px-3 m-1 text-md hover:bg-gray-900 hover:text-white  opacity-75">
                        Send Friend Request
                    </button>
                @endcan

            </div>
        </div>
    </div>
</div>
