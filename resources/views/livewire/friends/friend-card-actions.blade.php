<div class="friend-list-view w-full h-full">
    <!-- profile picture end -->
    <div class=" ">
        <a href="#" class="">
            <figure class="profile-thumb-middle">
                <img src="{{$user->profile_photo_url}}" alt="profile picture">
            </figure>
        </a>
    </div>
    <!-- profile picture end -->
    <div class=" px-2 ">
        <h6 class="author"><a href="{{route('userProfile.show',['userProfile'=>$user->id])}}">{{$user->name}}</a></h6>
        {{--                todo make this buttons responsive on phone --}}
        <div class="py-2">
            @can('acceptFriendRequest',$user)
                <button wire:click="acceptInvitation"
                        class="font-semibold bg-red-500 p-1 px-3 m-1 text-md hover:bg-gray-900 text-white  opacity-75">
                    Accept
                </button>
                @can('denyFriendRequest',$user)
                    <button wire:click="denyInvitation"
                            class=" bg-gray-200 p-1 px-3 m-1 text-md hover:bg-gray-900 hover:text-white  opacity-75">
                        Deny
                    </button>
                @endcan
            @elsecan('sendFriendRequest',$user)
                <button wire:click="sendInvitation"
                        class="font-semibold bg-red-500 p-1 px-3 m-1 text-md hover:bg-gray-900 text-white  opacity-75">
                    Send Friend Request
                </button>
            @elsecan('cancelFriendRequest',$user)
                <button wire:click="cancelInvitation"
                        class="font-semibold bg-gray-50 p-1 px-3 m-1 text-md hover:text-gray-50 hover:bg-gray-700 text-black  opacity-75">
                    Cancel Friend Request
                </button>
            @elsecan('removeFriend',$user)
                <button wire:click="removeFriend"
                        class="font-semibold bg-gray-50 p-1 px-3 m-1 text-md hover:text-gray-50 hover:bg-gray-700 text-black  opacity-75">
                    Unfriend
                </button>
            @endcan
        </div>
    </div>
</div>
