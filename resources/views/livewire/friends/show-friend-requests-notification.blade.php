@if($screen=='small')
    <div class="mx-3 d-block d-lg-none">
        <button class="notification request-trigger font-hairline">
            <svg class="h-6 w-6 text-gray-800 btn" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            @if($notificationCount )
                <span>{{$notificationCount}}</span>
                <span class="animate-ping">{{$notificationCount}}</span>
            @endif
        </button>
        <ul class="frnd-request-list">
            @forelse($friendRequests as $user)
                <li class="pb-2 mb-2 border-b ">
                    <div class="frnd-request-member">
                        <figure class="request-thumb overflow-hidden rounded-full ">
                            <a href="{{route('userProfile.show',['userProfile'=>$user->id])}}">
                                <img class="w-full h-full" src="{{$user->profile_photo_url}}" alt="proflie author">
                            </a>
                        </figure>
                        <div class="frnd-content">
                            <h6 class="author"><a
                                    href="{{route('userProfile.show',['userProfile'=>$user->id])}}">{{$user->name}}</a>
                            </h6>
                            <p class="author-subtitle">{{$user->pivot->created_at->diffForHumans()}}</p>
                            <div class="request-btn-inner">
                                <button wire:click="acceptInvitation('{{$user->id}}')" class="frnd-btn">confirm</button>
                                <button wire:click="denyInvitation('{{$user->id}}')" class="frnd-btn delete">delete
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li>
                    <div class="frnd-request-member w-1/3">
                        You don't have any Friend Request at this moment !
                    </div>
                </li>
            @endforelse
        </ul>
    </div>
@else
    <li class="notification-trigger">
        <a class="msg-trigger-btn relative" href="#b">
            notification
            @if($notificationCount )
                <div
                    class="absolute w-5 h-5 pt-1 -mr-3 font-hairline rounded-full text-xs text-center text-white bg-red-500 opacity-75 top-0 right-0">
                    {{$notificationCount}}
                </div>
                <div
                    class="absolute w-5 h-5 pt-1 -mr-3 font-hairline rounded-full text-xs text-center text-white bg-red-500 opacity-75 top-0 right-0 animate-ping">
                    {{$notificationCount}}
                </div>
            @endif
        </a>
        <div class="message-dropdown" id="b">

            <ul class="dropdown-msg-list">
                @forelse($friendRequests as $user)
                    <li class="w-full pb-2 mb-2 border-b ">
                        <div class="frnd-request-member">
                            <figure class="request-thumb overflow-hidden rounded-full ">
                                <a href="{{route('userProfile.show',['userProfile'=>$user->id])}}">
                                    <img class="w-full h-full" src="{{$user->profile_photo_url}}" alt="proflie author">
                                </a>
                            </figure>
                            <div class="frnd-content">
                                <h6 class="author opacity-75"><a
                                        href="{{route('userProfile.show',['userProfile'=>$user->id])}}">{{$user->name}}</a>
                                </h6>
                                <p class="pt-0">{{$user->pivot->created_at->diffForHumans()}}</p>
                                <div class="request-btn-inner mt-0">
                                    <button wire:click="acceptInvitation('{{$user->id}}')" class="frnd-btn opacity-75">
                                        confirm
                                    </button>
                                    <button wire:click="denyInvitation('{{$user->id}}')" class="frnd-btn delete">
                                        delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
            @empty
                    <li>
                        <div class="frnd-request-member ">
                            You don't have any Friend Requests at this moment !
                        </div>
                    </li>
            @endforelse
            </ul>
        </div>
    </li>
@endif

