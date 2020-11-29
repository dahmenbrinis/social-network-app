<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="-mt-3 relative">
        <label
            class="bg-gray-900 ring-1 ring-gray-100 p-2 m-2 absolute text-gray-100 text-lg right-0 top-0 cursor-pointer hover:opacity-25 opacity-75">
            <span>update Cover</span>
            <input type='file' class="hidden"/>
        </label>
        <img class="profile-banner-large bg-img w-full object-center object-cover"
             src="{{($user->coverImage)?$user->coverImage->getUrl():asset('assets/images/projectImages/profileCover.jpg')}}">
        <div class="profile-menu-area bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-2">
                        <div class="profile-picture-box">
                            <figure class="profile-picture w-48  ">
                                <img class="w-full h-full object-center object-cover"
                                     src="{{$user->profile_photo_url}}">
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 ">
                        <div class="profile-menu-wrapper">
                            <div class="main-menu-inner header-top-navigation">
                                <nav>
                                    <ul class="main-menu">
                                        <li><a href="#">{{$user->name}}</a></li>
                                        <li><a href="{{route('friends.show',['friend'=>$user])}}">Friends</a></li>

                                        <!-- <li class="d-inline-block d-md-none"><a href="profile.html">edit profile</a></li> -->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 d-none d-md-block">
                        <div class="profile-edit-panel  flex ">
                            @can('acceptFriendRequest',$user)
                                <button wire:click="acceptInvitation"
                                        class="edit-btn font-semibold px-3 m-1 text-md text-white ">
                                    Accept
                                </button>
                                @can('denyFriendRequest',$user)
                                    <button wire:click="denyInvitation"
                                            class=" edit-btn font-semibold  px-3 m-1 text-md text-white  bg-gray-200">
                                        Deny
                                    </button>
                                @endcan
                            @elsecan('sendFriendRequest',$user)
                                <button wire:click="sendInvitation"
                                        class="edit-btn font-semibold px-3 m-1 text-md text-white ">
                                    Send Friend Request
                                </button>
                            @elsecan('removeFriend',$user)
                                <button wire:click="removeFriend"
                                        class="edit-btn font-semibold p-3 px-3 m-1 text-md text-white ">
                                    remove from friends list
                                </button>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">...</div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <livewire:user-profile.index :user='$user->id'/>
                </div>
                <div class="col-lg-3 order-3">...</div>
            </div>
        </div>
    </div>

</x-app-layout>
