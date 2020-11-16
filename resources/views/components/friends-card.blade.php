<div
    class="p-2 rounded-lg shadow-lg flex items-center justify-between flex-wrap inline-flex border-2 border-indigo-200 ">
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
    <div class="right-0  ">
        {{$rightSide}}
    </div>
</div>

