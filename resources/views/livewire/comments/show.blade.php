<div class="flex items-center" :key="$post->id">
    <div class="w-1/4 m-2 flex-wrap inline-flex items-center">
        <a href="#">
            <img
                class="h-10 w-10 rounded-full object-cover border-double object-cover object-center border-blue-500 hover:border-blue-400 hover:opacity-75"
                src="{{ $comment->user->profile_photo_url }}"/>
        </a>
        <div class="m-1">
            <a href="#"
               class="text-blue-600 text-md font-semibold hover:text-indigo-500 ">{{$comment->name}}</a>
            <div class="pt-1 text-gray-800 text-xs  font-light">posted at
                : {{$comment->created_at->diffForHumans()}}</div>
        </div>
    </div>
    <div class=" my-2 ml-2  ">
        <p class="">
            {{$comment->content}}
        </p>
    </div>
</div>
