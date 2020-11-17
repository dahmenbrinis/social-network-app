<div
    class=" rounded flex items-center justify-between   ">
    {{--profile of the poster--}}
    <div class="group inline-flex items-center">
        <a href="#"
           class="{{$size}} rounded-full overflow-hidden group-hover:border-blue-400 group-hover:opacity-75 ">
            <img class="  object-cover object-center "
                 src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"/>
        </a>
        <div class="ml-2">
            <a class="text-blue-600 font-semibold group-hover:text-indigo-500 ">{{$user->name}}</a>
            <p class="text-xs  ">{{$info}}</p>
        </div>
    </div>
    <div class="">
        {{$rightSide}}
    </div>
</div>

