<div class=" pt-3">
    <ul class="dropdown-msg-list">
        @foreach($comments as $comment)
            <li class="msg-list-item d-flex justify-content-between ">
                <!-- profile start -->
                <div class="profile-thumb">
                    <figure class="profile-thumb-middle">
                        <img src="{{ $comment->user->profile_photo_url }}">
                    </figure>
                </div>
                <div class="msg-content notification-content ">
                    <a href="{{route('userProfile.show',['userProfile'=>$comment->user])}}">{{$comment->user->name}}</a><br>
                    <p>{{$comment->content}}</p>
                </div>
                <div class="msg-time">
                    <p>{{$comment->created_at->diffForHumans()}}</p>
                </div>
                <!-- profile end-->
            </li>
        @endforeach
    </ul>
    <div class="msg-dropdown-footer ">
        @if($canShowMore)
            <button wire:click.prevent="showMore">Show More Comments</button>
        @endif
        @if($comments->count() > $commentSizeSteps)
            <button wire:click.prevent="hideComments">Hide All Comments</button>
        @endif
    </div>
</div>


