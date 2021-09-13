<div>
    @foreach($posts as $post)
        <livewire:posts.show :post='$post' :key='$post->id'/>

    @endforeach
    {{--    {{$posts->links()}}--}}
    @if($postsPaginated<$postsCount)
        <button wire:click="showMore"
                class="fixed bottom-0 w-full py-2 text-red-500 bg-gray-100 rounded-sm shadow hover:bg-red-500 hover:text-white ">
            {{--                <span class="absolute z-10 animate-ping">show more</span>--}}
            <span class="w-full h-full font-bold">show more</span>
        </button>
    @endif
</div>
