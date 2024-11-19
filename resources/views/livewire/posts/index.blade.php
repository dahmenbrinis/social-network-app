<div>
    @foreach($posts as $post)
        <livewire:posts.show :post='$post' :key='$post->id'/>

    @endforeach
    {{--    {{$posts->links()}}--}}
    @if($postsPaginated<$postsCount)
            <div class="fixed bottom-0 col-lg-6 bg-red-600 w-full">asfasf</div>
        <button wire:click="showMore"
                class="fixed max-w-2xl w-full shadow-2xl bottom-0 py-2 text-red-500 bg-gray-100 rounded-sm  hover:bg-red-500 hover:text-white">
            {{--                <span class="absolute z-10 animate-ping">show more</span>--}}
            <span class="w-full h-full font-bold">show mores</span>
        </button>
    @endif
</div>
