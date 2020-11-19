<div class="">
    {{--    on large screen --}}
    <div class="header-top sticky bg-white d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <!-- header top navigation start -->
                    <div class="header-top-navigation">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{route('home')}}">home</a></li>
                                {{--                                    todo make these nav notifications buttons work --}}
                                <li class="msg-trigger"><a class="msg-trigger-btn" href="#a">message</a>
                                    <div class="message-dropdown" id="a">
                                        <div class="dropdown-title">
                                            <p class="recent-msg">recent message</p>
                                            <div class="message-btn-group">
                                                <button>New group</button>
                                                <button>New Message</button>
                                            </div>
                                        </div>
                                        <ul class="dropdown-msg-list">
                                            <li class="msg-list-item d-flex justify-content-between">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb">
                                                    <figure class="profile-thumb-middle">
                                                        <img src="assets/images/profile/profile-small-3.jpg"
                                                             alt="profile picture">
                                                    </figure>
                                                </div>
                                                <!-- profile picture end -->

                                                <!-- message content start -->
                                                <div class="msg-content">
                                                    <h6 class="author"><a href="profile.html">Mili Raoulin</a></h6>
                                                    <p>Many desktop publishing packages and web page editors now use
                                                        Lorem Ipsum as their default</p>
                                                </div>
                                                <!-- message content end -->

                                                <!-- message time start -->
                                                <div class="msg-time">
                                                    <p>25 Apr 2019</p>
                                                </div>
                                                <!-- message time end -->
                                            </li>
                                            <li class="msg-list-item d-flex justify-content-between">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb">
                                                    <figure class="profile-thumb-middle">
                                                        <img src="assets/images/profile/profile-small-4.jpg"
                                                             alt="profile picture">
                                                    </figure>
                                                </div>
                                                <!-- profile picture end -->

                                                <!-- message content start -->
                                                <div class="msg-content">
                                                    <h6 class="author"><a href="profile.html">Jhon Doe</a></h6>
                                                    <p>Many desktop publishing packages and web page editors now use
                                                        Lorem Ipsum as their default</p>
                                                </div>
                                                <!-- message content end -->

                                                <!-- message time start -->
                                                <div class="msg-time">
                                                    <p>15 May 2019</p>
                                                </div>
                                                <!-- message time end -->
                                            </li>
                                            <li class="msg-list-item d-flex justify-content-between">
                                                <!-- profile picture end -->
                                                <div class="profile-thumb">
                                                    <figure class="profile-thumb-middle">
                                                        <img src="assets/images/profile/profile-small-5.jpg"
                                                             alt="profile picture">
                                                    </figure>
                                                </div>
                                                <!-- profile picture end -->

                                                <!-- message content start -->
                                                <div class="msg-content">
                                                    <h6 class="author"><a href="profile.html">Jon Wileyam</a></h6>
                                                    <p>Many desktop publishing packages and web page editors now use
                                                        Lorem Ipsum as their default</p>
                                                </div>
                                                <!-- message content end -->

                                                <!-- message time start -->
                                                <div class="msg-time">
                                                    <p>20 Jun 2019</p>
                                                </div>
                                                <!-- message time end -->
                                            </li>
                                        </ul>
                                        <div class="msg-dropdown-footer">
                                            <button>See all in messenger</button>
                                            <button>Mark All as Read</button>
                                        </div>
                                    </div>
                                </li>
                                <livewire:friends.show-friend-requests-notification :screen="'large'"/>

                            </ul>
                        </nav>
                    </div>
                    <!-- header top navigation start -->
                </div>

                <div class="col-md-2">
                    <!-- brand logo start -->
                    <div class="brand-logo text-center">
                        <a href="index.html">
                            {{--                                todo change the logo image--}}
                            <img src="assets/images/logo/logo.png" alt="brand logo">
                        </a>
                    </div>
                    <!-- brand logo end -->
                </div>

                <div class="col-md-5">
                    <div class="header-top-right d-flex align-items-center justify-content-end">
                        <!-- header top search start -->
                        {{--                            todo try to make this search field useful--}}
                    {{--                        <livewire:friends.show-friend-requests-notification/>--}}

                    {{--                        <div class="header-top-search">--}}
                    {{--                            <form class="top-search-box">--}}
                    {{--                                <input type="text" placeholder="Search" class="top-search-field">--}}
                    {{--                                <button class="top-search-btn"><i class="flaticon-search"></i></button>--}}
                    {{--                            </form>--}}
                    {{--                        </div>--}}
                        <!-- header top search end -->
                        <!-- profile picture start -->
                        <div class="profile-setting-box">
                            <div class="profile-thumb-small">
                                <a href="javascript:void(0)" class="profile-triger">
                                    <figure>
                                        <img src="{{Auth::user()->profile_photo_url}}">
                                    </figure>
                                </a>
                                <div class="profile-dropdown">
                                    <div class="profile-head">
                                        <h5 class="name"><a
                                                href="{{route('userProfile.show',['userProfile'=>Auth::user()])}}">{{Auth::user()->name}}</a>
                                        </h5>
                                        <a class="mail"
                                           href="{{route('userProfile.show',['userProfile'=>Auth::user()])}}">{{Auth::user()->email}}</a>
                                    </div>
                                    <div class="profile-body">
                                        <ul>
                                            <li>
                                                <a href="{{route('userProfile.show',['userProfile'=>Auth::user()->id])}}"><i
                                                        class="flaticon-user"></i>Profile</a></li>
                                        </ul>
                                        <ul>
                                            <li><a href="{{route('profile.show')}}"><i class="flaticon-settings"></i>Setting</a>
                                            </li>
                                            <li>

                                                <form method="post" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                        this.closest('form').submit();"><i class="flaticon-unlock"></i>Sing
                                                        out</a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- profile picture end -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    on small screen --}}
    <div class="mobile-header-wrapper sticky d-block d-lg-none">
        <div class="mobile-header position-relative ">
            <div class="mobile-logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('assets/images/logo/logo-white.png')}}">
                </a>
            </div>
            <div class="mobile-menu w-100">
                <ul>
                    <li>
                        <livewire:friends.show-friend-requests-notification :screen="'small'"/>
                    </li>
                    <li>
                        <button class="notification"><i class="flaticon-notification"></i>
                            <span>03</span>
                        </button>
                    </li>
                    <li>
                        <button class="chat-trigger notification"><i class="flaticon-chats"></i>
                            <span>04</span>
                        </button>
                        <div class="mobile-chat-box">
                            <div class="live-chat-title">
                                <!-- profile picture end -->
                                <div class="profile-thumb">
                                    <a href="profile.html">
                                        <figure class="profile-thumb-small profile-active">
                                            <img src="assets/images/profile/profile-small-15.jpg" alt="profile picture">
                                        </figure>
                                    </a>
                                </div>
                                <!-- profile picture end -->
                                <div class="posted-author">
                                    <h6 class="author"><a href="profile.html">Robart Marloyan</a></h6>
                                    <span class="active-pro">active now</span>
                                </div>
                                <div class="live-chat-settings ml-auto">
                                    <button class="chat-settings"><img src="assets/images/icons/settings.png" alt="">
                                    </button>
                                    <button class="close-btn"><img src="assets/images/icons/close.png" alt=""></button>
                                </div>
                            </div>
                            <div class="message-list-inner">
                                <ul class="message-list custom-scroll ps ps--active-y">
                                    <li class="text-friends">
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                            their default model text</p>
                                        <div class="message-time">10 minute ago</div>
                                    </li>
                                    <li class="text-author">
                                        <p>Many desktop publishing packages and web page editors</p>
                                        <div class="message-time">5 minute ago</div>
                                    </li>
                                    <li class="text-friends">
                                        <p>packages and web page editors </p>
                                        <div class="message-time">2 minute ago</div>
                                    </li>
                                    <li class="text-friends">
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                            their default model text</p>
                                        <div class="message-time">10 minute ago</div>
                                    </li>
                                    <li class="text-author">
                                        <p>Many desktop publishing packages and web page editors</p>
                                        <div class="message-time">5 minute ago</div>
                                    </li>
                                    <li class="text-friends">
                                        <p>packages and web page editors </p>
                                        <div class="message-time">2 minute ago</div>
                                    </li>
                                    <div class="ps__rail-x" style="left: 0px; bottom: 3px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; height: 350px; right: 2px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 157px;"></div>
                                    </div>
                                </ul>
                            </div>
                            <div class="chat-text-field mob-text-box">
                                <textarea class="live-chat-field custom-scroll ps" placeholder="Text Message"><div
                                        class="ps__rail-x" style="left: 0px; bottom: 3px;"><div class="ps__thumb-x"
                                                                                                tabindex="0"
                                                                                                style="left: 0px; width: 0px;"></div></div><div
                                        class="ps__rail-y" style="top: 0px; right: 2px;"><div class="ps__thumb-y"
                                                                                              tabindex="0"
                                                                                              style="top: 0px; height: 0px;"></div></div></textarea>
                                <button class="chat-message-send" type="submit" value="submit">
                                    <img src="assets/images/icons/plane.png" alt="">
                                </button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <button class="search-trigger">
                            <i class="search-icon flaticon-search"></i>
                            <i class="close-icon flaticon-cross-out"></i>
                        </button>
                        <div class="mob-search-box">
                            <form class="mob-search-inner">
                                <input type="text" placeholder="Search Here" class="mob-search-field">
                                <button class="mob-search-btn"><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="pr-3 pt-1">
                <!-- profile picture end -->
                <div class="profile-thumb profile-setting-box">
                    <a href="javascript:void(0)" class="profile-triger">
                        <figure class="profile-thumb-middle">
                            <img src="{{Auth::user()->profile_photo_url}}" alt="profile picture">
                        </figure>
                    </a>
                    <div class="profile-dropdown text-left" style="display: block;">
                        <div class="profile-head">
                            <h5 class="name"><a
                                    href="{{route('userProfile.show',['userProfile'=>Auth::id()])}}">{{Auth::user()->name}}</a>
                            </h5>
                        </div>
                        <div class="profile-body">
                            <ul>
                                <li><a href="profile.html"><i class="flaticon-user"></i>Profile</a></li>
                                <li><a href="#"><i class="flaticon-message"></i>Inbox</a></li>
                                <li><a href="#"><i class="flaticon-document"></i>Activity</a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
                                <li><a href="signup.html"><i class="flaticon-unlock"></i>Sing out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- profile picture end -->
            </div>
        </div>
    </div>
</div>
