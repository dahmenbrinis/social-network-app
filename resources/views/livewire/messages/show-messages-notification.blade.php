@if($screen=='large')
    <li class="msg-trigger">
        <a class="msg-trigger-btn relative" href="#a" wire:navigate>message
            @if($notificationCount)
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
        <div class="message-dropdown" id="a">
            <div class="dropdown-title">
                <p class="recent-msg">recent message</p>
            </div>
            <ul class="dropdown-msg-list">
                @forelse($messages as $message)
                    <li class="msg-list-item d-flex justify-content-between">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <figure class="profile-thumb-middle">
                                <img src="{{\App\Models\User::find($message->data['senderId'])->profile_photo_url}}"
                                     alt="image">
                            </figure>
                        </div>
                        <!-- profile picture end -->

                        <!-- message content start -->
                        <div class="msg-content">
                            <h6 class="author"><p>{{\App\Models\User::find($message->data['senderId'])->name}}</p></h6>
                            <p>{{\App\Models\User::find($message->data['senderId'])->messages_received->last()->pivot->content}}</p>
                        </div>
                        <!-- message content end -->

                        <!-- message time start -->
                        <div class="msg-time">
                            <p>{{\App\Models\User::find($message->data['senderId'])->messages_received->last()->created_at->diffForHumans()}}</p>
                        </div>
                        <!-- message time end -->
                    </li>
                @empty
                    <li>
                        <div class="msg-list-item d-flex justify-content-between">
                            You don't have any messages .
                        </div>
                    </li>
                @endforelse
            </ul>
            @if($notificationCount)
                <div class="msg-dropdown-footer">
                    <button wire:click="notificationSeen">Mark All as Read</button>
                </div>
            @endif
        </div>
    </li>
@else
    {{--    todo: make the ui for the small phones --}}
    <button class="chat-trigger notification"><i class="flaticon-chats"></i>
        <span>{{$notificationCount}}</span>
    </button>
@endif
