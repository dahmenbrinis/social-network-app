<div>
    @foreach($posts as $post)
        <livewire:posts.show :post='$post' :key='$post->id'/>
    @endforeach
    {{$posts->links()}}
</div>
