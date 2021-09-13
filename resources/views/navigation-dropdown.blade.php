<div class="">
    {{--    on large screen --}}
    <div class="sticky bg-white header-top d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <!-- header top navigation start -->
                    <div class="header-top-navigation">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{route('home')}}">home</a></li>
                                {{--                                    todo make these nav notifications buttons work --}}
                                <livewire:messages.show-messages-notification :screen="'large'"/>
                                <livewire:friends.show-friend-requests-notification :screen="'large'"/>

                            </ul>
                        </nav>
                    </div>
                    <!-- header top navigation start -->
                </div>

                <div class="col-md-2">
                    <!-- brand logo start -->
                    <div class="text-center brand-logo">
                        <div class="w-12 ">
                            <x-logo></x-logo>
                        </div>
                    </div>
                    <!-- brand logo end -->
                </div>

                <div class="col-md-5">
                    <div class="header-top-right d-flex align-items-center justify-content-end">
                        <!-- header top search start -->
                        {{--                            todo try to make this search field useful--}}
                        {{--                                                <livewire:friends.show-friend-requests-notification/>--}}
                        <a class='px-10 py-2 font-bold text-black text-md lg:block hover:text-red-500 xs:hidden'
                           href="{{route('friends.index')}}">
                            Add Friends
                        </a>
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
    <div class="sticky mobile-header-wrapper d-block d-lg-none">
        <div class="mobile-header position-relative ">

            <a class="pl-3" href="{{route('home')}}">
                <div class="w-10 ">
                    <x-logo></x-logo>
                </div>
            </a>

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
                        <livewire:messages.show-messages-notification :screen="'small'"/>
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
            <div class="pt-1 pr-3">
                <!-- profile picture end -->
                <div class="profile-thumb profile-setting-box">
                    <a href="javascript:void(0)" class="profile-triger">
                        <figure class="profile-thumb-middle">
                            <img src="{{Auth::user()->profile_photo_url}}">
                        </figure>
                    </a>
                    <div class="text-left profile-dropdown" style="display: block;">
                        <div class="profile-head">
                            <h5 class="name"><a
                                    href="{{route('userProfile.show',['userProfile'=>Auth::id()])}}">{{Auth::user()->name}}</a>
                            </h5>
                        </div>
                        <div class="profile-body">
                            <ul>
                                <li><a href="{{route('profile.show')}}"><i class="flaticon-user"></i>Profile</a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><i class="flaticon-settings"></i>Setting</a></li>
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
                <!-- profile picture end -->
            </div>
        </div>
    </div>
</div>








