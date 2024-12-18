<div class="card">
    <!-- post title start -->
    <div class="post-title d-flex align-items-center">
        <!-- profile picture end -->
        <div class="profile-thumb">
            <a href="#">
                <figure class="profile-thumb-middle">
                    <img src="{{ $post->user->profile_photo_url }}">
                </figure>
            </a>
        </div>
        <!-- profile picture end -->

        <div class="posted-author">
            <h6 class="author"><a
                    href="{{route('userProfile.show',['userProfile'=>$post->user])}}">{{$post->user->name}}</a></h6>
            <span class="post-time">{{$post->created_at->diffForHumans()}}</span>
        </div>
        @can('update',$post)
            <div class="post-settings-bar">
                <span></span>
                <span></span>
                <span></span>
                <div class="post-settings arrow-shape">
                    <ul>
                        {{--                        todo make these post buttons work--}}
                        <li>
                            <button>edit post</button>
                        </li>
                        <li>
                            <button wire:click="delete">delete post</button>
                        </li>
                    </ul>
                </div>
            </div>
        @endcan
    </div>
    <!-- post title start -->
    <div class="post-content">
        <p class="text-lg font-semibold">{{$post->title}}</p>
        <p class="post-desc">{{$post->body}}</p>
        <div class="post-thumb-gallery img-gallery">
            <div class="flex ">
                @if($post->images->first())
                    <div class="flex-grow">
                        <figure class="w-full h-full post-thumb py-0.5">
                            <a class="w-full h-full gallery-selector"
                               href="{{$post->images->first()->getUrl()}}">
                                <img class="w-full h-full" src="{{$post->images->first()->getUrl()}}">
                            </a>
                        </figure>
                    </div>
                @endif
                @if($post->images->count()>1)
                    <div class="flex flex-col w-2/5">
                        <div class="flex h-full flex-col justify-center items-center">
                            @foreach($post->images as $key => $image)
                                @if($key>0 and $key<5 )
                                    <div class="flex-grow my-auto">
                                        <figure class="post-thumb p-0.5">
                                            <a class="gallery-selector" href="{{Storage::url($image->url)}}">
                                                <img src="{{Storage::url($image->url)}}" alt="post image">
                                            </a>
                                        </figure>
                                    </div>
                                @elseif($key > 3 )
                                    <div class="hidden">
                                        <figure class="post-thumb">
                                            <a class="gallery-selector" href="{{Storage::url($image->url)}}">
                                                <img src="{{Storage::url($image->url)}}" alt="post image">
                                            </a>
                                        </figure>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div class="post-meta">
            <button class="post-meta-like" wire:click="like">
                <i class="bi bi-heart-beat"></i>
                <span>{{($post->isReactedBy(Auth::user()))?'You '.(($likes>1)?'And '.($likes-1).' people ':'')
                :(($likes>1)?($likes-1).' people ':"")}} like this</span>
                <strong>{{$likes}}</strong>
            </button>
            <ul class="comment-share-meta">
                <li>
                    <button wire:click="$dispatch('showComments' ,  { post: {{ $post->id }} })">
                        <i class="bi bi-chat-bubble"></i>
                        <span>{{$commentsCount}}</span>
                    </button>
                </li>
                <li>
                    <button class="post-share">
                        <i class="bi bi-share"></i>
                        <span>0</span>
                    </button>
                </li>
            </ul>
        </div>

        <livewire:comments.index :post="$post" :key="'comments-'.$post->id"/>
        <livewire:comments.create :post="$post"/>
    </div>
</div>

