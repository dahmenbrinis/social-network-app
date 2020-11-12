<?php

namespace App\Http\Livewire\Comments;

use Livewire\Component;

class Index extends Component
{
    public $post;
    public $commentSizeSteps;
    public $commentSize;
    public $canShowMore = false;

    public function getListeners()
    {
        return [
            "echo:comment-updated-on-post-{$this->post->id},CommentsEvent" => '$refresh',
        ];
    }

    public function render()
    {
        $comments = $this->post->comments()->orderByDesc('created_at')->take($this->commentSize)->get()->reverse();
        $this->canShowMore = ($comments->count() >= $this->commentSize);
        return view('livewire.comments.index', compact('comments'));
    }

    public function mount($post)
    {
        $this->commentSizeSteps = 3;
        $this->commentSize = $this->commentSizeSteps;
        $this->post = $post;
    }

    public function showMore()
    {
        $this->commentSize += $this->commentSizeSteps;
    }

    public function hideComments()
    {
        $this->commentSize = $this->commentSizeSteps;
    }

}
