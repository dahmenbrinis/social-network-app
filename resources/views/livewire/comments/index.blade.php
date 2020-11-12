<div class="w-full px-8">
    @if($canShowMore)
        <button wire:click.prevent="showMore" class="p-2 text-blue-500 hover:underline">
            show more comments
        </button>
    @elseif($comments->count() > $commentSizeSteps)
        <button wire:click.prevent="hideComments" class="p-2 text-blue-500 hover:underline">
            hide the comments
        </button>
    @endif
    @foreach($comments as $comment)
        <div class="flex items-center">
            <div class="w-1/4 m-2 flex-wrap inline-flex items-center">
                <a href="#">
                    <img
                        class="h-10 w-10 rounded-full object-cover border-double object-cover object-center border-blue-500 hover:border-blue-400 hover:opacity-75"
                        src="{{ $comment->user->profile_photo_url }}"/>
                </a>
                <div class="m-1">
                    <a href="#"
                       class="text-blue-600 text-md font-semibold hover:text-indigo-500 ">
                        {{(Auth::user()->id==$comment->user->id)?" You ":$comment->user->name}}
                    </a>
                    <div class="pt-1 text-gray-800 text-xs font-light hidden sm:hidden lg:block xl:block ">posted at
                        : {{$comment->created_at->diffForHumans()}}</div>
                </div>
            </div>
            <div class=" my-2 ml-2  ">
                <p class="">
                    {{$comment->content}}
                </p>
            </div>
        </div>
    @endforeach
    {{--        {{$comments->links()}}--}}

</div>
