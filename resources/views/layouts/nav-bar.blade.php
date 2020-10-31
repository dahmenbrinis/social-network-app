<nav class="bg-gray-800">
    <div class=" mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex">
                    <a href="{{ url('/') }}"
                       class=" px-3 py-2  mx-5 rounded-md text-xl font-bold leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Social-App</a>
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex">

                        {{--                                the nav-bar elements --}}

                        {{--                                <a href="#"--}}
                        {{--                                   class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Products--}}
                        {{--                                    List</a>--}}

                    </div>
                </div>
            </div>

            <div
                class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="ml-3 relative">
                    <div>

                        <button onclick="dropdown()"
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-white transition duration-150 ease-in-out"
                                id="user-menu" aria-label="User menu" aria-haspopup="true">
                            <p class="py-1 px-3 font-bold text-gray-100 text-lg">{{ Auth::user()->name }}</p>
                            <img class="h-8 w-8 mr-2 rounded-full"
                                 src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                 alt="">
                        </button>
                    </div>
                    <div id="droped_target"
                         class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg">
                        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                             aria-labelledby="user-menu">
                            <a href="#"
                               class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem">Your Profile</a>

                            <a href="{{route('user.edit',['user'=>auth()->user()->id])}}"
                               class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem">Edit Profile</a>

                            <a href="{{route('update_password')}}"
                               class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem">Change Password</a>

                            <a href="#"
                               class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                               role="menuitem"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
