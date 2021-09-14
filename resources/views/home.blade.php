<x-app-layout>
    <div class=" container ">
        <div class=" row">

            <div class="col-lg-3 order-2 order-lg-1">
                <aside class="widget-area">
                    <div class="card card-profile widget-item p-0">
                        <div class="profile-banner">
                            <figure class="profile-banner-small">
                                <a href="{{route('userProfile.show',['userProfile'=>Auth::id()])}}">
                                    <img class="h-32 object-cover object-center"
                                         src="{{(Auth::user()->coverImage)?Auth::user()->coverImage->getUrl():asset('assets/images/projectImages/profileCover.jpg')}}
                                             " alt="">
                                </a>
                                <a href="{{route('userProfile.show',['userProfile'=>Auth::id()])}}"
                                   class="profile-thumb-2">
                                    <img class=" rounded-full object-cover object-center"
                                         src="{{Auth::user()->profile_photo_url }}" alt="">
                                </a>
                            </figure>
                            <div class="profile-desc text-center">
                                <h6 class="author"><a
                                        href="{{route('userProfile.show',['userProfile'=>Auth::id()])}}">{{Auth::user()->name}}</a>
                                </h6>
                                <p>short profile Description here !</p>
                            </div>
                        </div>
                    </div>
                    <!-- widget single item start -->
                    <div class="card widget-item">
                        <h4 class="widget-title">Suggested Friends</h4>
                        <div class="widget-body">
                            <ul class="like-page-list-wrapper">
                                @foreach(Auth::user()->suggestedFriends()->get() as $user)
                                    <li class="unorder-list">
                                        <!-- profile picture end -->
                                        <div class="profile-thumb">
                                            <a href="{{route('userProfile.show',['userProfile'=>$user->id])}}">
                                                <figure class="profile-thumb-small">
                                                    <img src="{{$user->profile_photo_url}}"
                                                         alt="profile picture">
                                                </figure>
                                            </a>
                                        </div>
                                        <!-- profile picture end -->
                                        <div class="unorder-list-info">
                                            <h3 class="list-title"><a
                                                    href="{{route('userProfile.show',['userProfile'=>$user->id])}}">{{$user->name}}</a>
                                            </h3>
                                            <p class="list-subtitle">{{$user->friends()->count()}} mutual friends</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- widget single item end -->
                </aside>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 ">
                <div class="card card-small">
                    <div class="share-box-inner">
                        <!-- profile picture end -->
                        <div class="profile-thumb">
                            <a href="{{route('userProfile.show',['userProfile'=>Auth::id()])}}">
                                <figure class="profile-thumb-middle">
                                    <img src="{{Auth::user()->profile_photo_url}}">
                                </figure>
                            </a>
                        </div>
                        <!-- profile picture end -->

                        <!-- share content box start -->
                        <div class="share-content-box w-100">
                            <div class="share-text-box ">
                                <textarea name="share" class="share-text-field" aria-disabled="true"
                                          placeholder="Say Something"
                                          data-toggle="modal" data-target="#textbox" id="email"></textarea>
                                <button class="btn-share">share</button>
                            </div>
                        </div>
                        <!-- share content box end -->

                        <!-- Modal start -->
                        <div class="modal fade " id="textbox" aria-labelledby="textbox">


                            <livewire:posts.create wire:key="create"/>

                        </div>
                        <!-- Modal end -->
                    </div>

                </div>
                <livewire:posts.index/>
            </div>
            <div class="col-lg-3 order-3">
                <aside class="widget-area">
                    <livewire:messages.messages-nav-bar/>
                </aside>
            </div>
        </div>
    </div>
</x-app-layout>

