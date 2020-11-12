<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-gray-100 max-w-7xl w-2/3 mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg">
                @include('posts.create')

                @foreach($posts as $post)
                    <div class="relative bg-white p-6 first:my-0 my-12 rounded-lg shadow-lg">
                        <div class="text-lg text-center text-xl font-semibold">{{$post->title}} </div>
                        {{--profile of the poster--}}
                        <div class="group absolute left-0 top-0 m-6 mt-12 flex-wrap inline-flex">
                            <a href="#"
                               class="h-12 w-12 border-2 border-indigo-500 rounded-full overflow-hidden group-hover:border-blue-400 group-hover:opacity-75">
                                <img class="  object-cover object-center "
                                     src="{{ $post->user->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                            </a>
                            <div class="m-2">
                                <a href="#"
                                   class="text-blue-600 text-lg font-semibold group-hover:text-indigo-500 ">{{$post->user->name}}</a>
                                <div class="pt-1 text-gray-800 text-xs  font-light">posted at
                                    : {{$post->created_at->diffForHumans()}}</div>
                            </div>
                        </div>

                        @can('update',$post)
                            <div class="absolute right-0 top-0 cursor-pointer text-blue-500 ">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <svg
                                            class="h-10 w-10 rounded duration-150 p-1 mx-6 mt-6 hover:opacity-75 hover:shadow-md "
                                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z"/>
                                            <circle cx="12" cy="12" r="1"/>
                                            <circle cx="12" cy="19" r="1"/>
                                            <circle cx="12" cy="5" r="1"/>
                                        </svg>
                                    </x-slot>
                                    <x-slot name="content">
                                        <!-- Post Management -->
                                        @can('update',$post)
                                            <x-jet-dropdown-link class="flex my-1 items-center justify-between px-3"
                                                                 href="{{ route('profile.show') }}">
                                                <span class="text-lg">{{ __('Edit') }}</span>
                                                <svg class="h-6 w-6 text-indigo-500 ml-2" viewBox="0 0 24 24"
                                                     fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6"/>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                                </svg>
                                            </x-jet-dropdown-link>
                                        @endcan
                                        @can('delete',$post)
                                            <form action="{{route('post.destroy',compact('post'))}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <x-jet-dropdown-link
                                                    class="flex my-1 items-center justify-between px-3 hover:bg-red-100"
                                                    href="#"
                                                    onclick="event.preventDefault();this.closest('form').submit(); console.log(this.closest('form'))">
                                                    <span class="text-lg">{{ __('Remove') }}</span>
                                                    <svg class="h-6 w-6 text-red-500" viewBox="0 0 24 24"
                                                         stroke-width="2"
                                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                                         stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z"/>
                                                        <path
                                                            d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"/>
                                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                                                        <line x1="16" y1="5" x2="19" y2="8"/>
                                                    </svg>
                                                </x-jet-dropdown-link>
                                            </form>

                                        @endcan
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        @endcan
                        {{--                        todo make the dropdown setting of the post work  --}}
                        <div class="block mt-16">
                            <p class="text-gray-600 ">
                                {{$post->body}}
                            </p>
                        </div>
                        <div class="mt-6 flex justify-around ">

                            <form action="{{route('like',['post'=>$post])}}" method="post"
                                  class=" w-1/3 h-full   py-3 mr-4 ">
                                @csrf
                                <button type="button"
                                        class="flex items-center w-full h-full justify-center focus:outline-none hover:opacity-75">
                                    <i class="mr-2 ">
                                        <svg
                                            class="fill-current text-indigo-500 w-6 h-6"
                                            height="512"
                                            viewBox="0 0 16 16"
                                            width="512"
                                        >
                                            <path
                                                d="M0 6v8a1 1 0 001 1h3V5H1a1 1 0 00-1 1zM14.153 6H11.2a.491.491 0 01-.43-.247.492.492 0 01-.007-.496l1.041-1.875c.229-.411.252-.894.065-1.325a1.488 1.488 0 00-1.013-.858l-.734-.184a.499.499 0 00-.493.15l-3.987 4.43A2.499 2.499 0 005 7.267V12.5C5 13.878 6.122 15 7.5 15h4.974a2.506 2.506 0 002.411-1.84l1.068-4.898A1.849 1.849 0 0014.153 6z"
                                            />
                                        </svg>
                                    </i>
                                    <p class="mt-1 text-blue-500">Like ({{$post->reactions->count()}})</p>
                                </button>
                            </form>
                            <form action="{{route('like',['post'=>$post])}}" method="post"
                                  class=" w-1/3 h-full  py-3 mx-4 ">
                                @csrf
                                <button type="submit"
                                        class="flex items-center w-full h-full justify-center focus:outline-none hover:opacity-75 mr-4">
                                    <i class="mr-2">
                                        <svg
                                            class="fill-current text-indigo-500 w-6 h-6"
                                            height="512"
                                            viewBox="0 0 511.072 511.072"
                                            width="512"
                                        >
                                            <path
                                                d="M74.39 480.536H38.177l25.607-25.607c13.807-13.807 22.429-31.765 24.747-51.246-36.029-23.644-62.375-54.751-76.478-90.425C-2.04 277.611-3.811 238.37 6.932 199.776c12.89-46.309 43.123-88.518 85.128-118.853 45.646-32.963 102.47-50.387 164.33-50.387 77.927 0 143.611 22.389 189.948 64.745 41.744 38.159 64.734 89.63 64.734 144.933 0 26.868-5.471 53.011-16.26 77.703-11.165 25.551-27.514 48.302-48.593 67.619-46.399 42.523-112.042 65-189.83 65-28.877 0-59.01-3.855-85.913-10.929-25.465 26.123-59.972 40.929-96.086 40.929zm182-420c-124.039 0-200.15 73.973-220.557 147.285-19.284 69.28 9.143 134.743 76.043 175.115l7.475 4.511-.23 8.727c-.456 17.274-4.574 33.912-11.945 48.952 17.949-6.073 34.236-17.083 46.99-32.151l6.342-7.493 9.405 2.813c26.393 7.894 57.104 12.241 86.477 12.241 154.372 0 224.682-93.473 224.682-180.322 0-46.776-19.524-90.384-54.976-122.79-40.713-37.216-99.397-56.888-169.706-56.888z"
                                            />
                                        </svg>
                                    </i>
                                    <p class="mt-1 text-blue-500">{{$post->comments->count()}} Comments</p>
                                </button>
                            </form>
                            <form action="{{route('like',['post'=>$post])}}" method="post"
                                  class=" w-1/3 h-full  py-3 mx-4 ">
                                @csrf
                                <button disabled
                                        class="flex text-gray-600 items-center w-full h-full justify-center focus:outline-none ">
                                    <i class="mr-2">
                                        <svg class="h-6 w-6 " viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="18" cy="5" r="3"/>
                                            <circle cx="6" cy="12" r="3"/>
                                            <circle cx="18" cy="19" r="3"/>
                                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/>
                                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                                        </svg>
                                    </i>
                                    <p class="mt-1 ">Share</p>
                                </button>
                            </form>
                        </div>
                        {{--                        todo make these buttons work --}}
                        {{--                             todo show the comments of the post --}}
                        <div class="w-full px-8">
                            @foreach($post->comments as $comment)
                                <div class="flex items-center  ">
                                    <div class="w-1/4 m-2 flex-wrap inline-flex items-center">
                                        <a href="#">
                                            <img
                                                class="h-10 w-10 rounded-full object-cover border-double object-cover object-center border-blue-500 hover:border-blue-400 hover:opacity-75"
                                                src="{{ $post->user->profile_photo_url }}"
                                                alt="{{ Auth::user()->name }}"/>
                                        </a>
                                        <div class="m-1">
                                            <a href="#"
                                               class="text-blue-600 text-md font-semibold hover:text-indigo-500 ">{{$comment->name}}</a>
                                            <div class="pt-1 text-gray-800 text-xs  font-light">posted at
                                                : {{$comment->pivot->created_at->diffForHumans()}}</div>
                                        </div>
                                    </div>
                                    <div class=" my-2 ml-2  ">
                                        <p class="">
                                            {{$comment->pivot->content}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <form action="{{route('comment.store',['post'=>$post])}}" method="post"
                              class="mt-6  border-gray-100 border-t-4 pt-4 flex justify-between">
                            @csrf
                            <div class="flex-grow mr-12">
                                <input name="content" placeholder="Add comment"
                                       class="placeholder-gray-300 text-gray-700 w-full h-full focus:outline-none"
                                       type="text">
                            </div>

                            <div class="flex">
                                <button class=" mr-4 p-2 " type="submit">
                                    <i class="flex flex-wrap items-center group">
                                        <svg class="group-hover:text-teal-300 iniline h-6 w-6 text-teal-500"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <line x1="22" y1="2" x2="11" y2="13"/>
                                            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
                                        </svg>
                                        <span class="ml-2 group-hover:text-gray-500">Send</span>
                                    </i>
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach

            </div>
            <div class="m-6 ">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</x-app-layout>




