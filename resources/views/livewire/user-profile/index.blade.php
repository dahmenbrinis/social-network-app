<div>
    @foreach($posts as $post)
        <livewire:posts.show :post='$post' :key='$post->id'/>
    @endforeach
    {{--    {{$posts->links()}}--}}
    @if($postsPaginated<$postsCount)
        <button wire:click="showMore"
                class="w-full bg-gray-100 shadow rounded-sm py-2 hover:bg-red-500 hover:text-white text-red-500  ">
            {{--                <span class="absolute z-10 animate-ping">show more</span>--}}
            <span class="w-full h-full font-bold">Show More Posts</span>
        </button>
        @endif
</div>
