<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="bg-gray-100 max-w-7xl w-2/3 mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg grid grid-cols-2 gap-4">
                @foreach($users as $user)
                    <form action="{{route('friend.store')}}" method="post"
                          class="p-2 rounded-lg shadow-lg flex items-center justify-between flex-wrap inline-flex border-2 border-indigo-200 ">
                        @csrf
                        <input type="hidden" name="user" value="{{$user->id}}">
                        {{--profile of the poster--}}
                        <div class="group flex-wrap inline-flex">
                            <a href="#"
                               class="h-12 w-12 border-2 border-indigo-500 rounded-full overflow-hidden group-hover:border-blue-400 group-hover:opacity-75">
                                <img class="  object-cover object-center "
                                     src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"/>
                            </a>
                            <div class="m-2">
                                <a href="#"
                                   class="text-blue-600 text-lg font-semibold group-hover:text-indigo-500 ">{{$user->name}}</a>
                            </div>
                        </div>
                        <button type="submit" class="btn group right-0 shadow-md h-12 py-4 px-6 flex items-center rounded-lg text-lg
                        font-semibold bg-white text-green-600 hover:opacity-75 ">
                            <p class="text-black group-hover:text-green-500 transition duration-200">add friend</p>
                            <svg class="h-full pl-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                        </button>
                    </form>
                @endforeach
            </div>
            <div class="m-6 ">
                {{$users->links()}}
            </div>
        </div>
    </div>
</x-app-layout>



