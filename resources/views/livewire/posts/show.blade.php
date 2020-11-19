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
            <h6 class="author"><a href="profile.html">{{$post->user->name}}</a></h6>
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
                            <button></button>
                        </li>
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
            <div class="row no-gutters">
                <div class="col-8">
                    <figure class="post-thumb">
                        <a class="gallery-selector" href="assets/images/post/post-large-2.jpg">
                            <img src="assets/images/post/post-2.jpg" alt="post image">
                        </a>
                    </figure>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-12">
                            <figure class="post-thumb">
                                <a class="gallery-selector" href="assets/images/post/post-large-3.jpg">
                                    <img src="assets/images/post/post-3.jpg" alt="post image">
                                </a>
                            </figure>
                        </div>
                        <div class="col-12">
                            <figure class="post-thumb">
                                <a class="gallery-selector" href="assets/images/post/post-large-4.jpg">
                                    <img src="assets/images/post/post-4.jpg" alt="post image">
                                </a>
                            </figure>
                        </div>
                        <div class="col-12">
                            <figure class="post-thumb">
                                <a class="gallery-selector" href="assets/images/post/post-large-5.jpg">
                                    <img src="assets/images/post/post-5.jpg" alt="post image">
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
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
                    <button class="post-comment">
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

        {{--                        todo make these buttons work --}}
        {{--                             todo show the comments of the post --}}
        {{--        <livewire:comments.index :post="$post" :key="'comments-'.$post->id"/>--}}
        {{--        <livewire:comments.create :post="$post"/>--}}
    </div>
</div>

