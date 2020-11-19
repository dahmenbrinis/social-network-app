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
            "echo-private:commentsUpdated.{$this->post->id},CommentsEvent" => '$refresh',
            'commentAdded' => '$refresh',
            'showMore' => 'showMore',
            'showComments' => 'showComments',
        ];
    }

    public function render()
    {
        $comments = $this->post->comments()->orderByDesc('created_at')->take($this->commentSize)->get()->reverse();
        $this->canShowMore = (boolean)($comments->count() >= $this->commentSize) && ($comments->count() != 0);
        return view('livewire.comments.index', compact('comments'));
    }

    public function mount($post)
    {
        $this->commentSizeSteps = 3;
        $this->commentSize = 0;
        $this->post = $post;
    }

    public function showMore()
    {
        if ($this->post->comments->count() > $this->commentSize) {
            $this->commentSize += $this->commentSizeSteps;
        }
    }

    public function showComments($post)
    {
        if ($this->post->id == $post) {
            $this->commentSize = ($this->commentSize == $this->commentSizeSteps) ? 0 : $this->commentSizeSteps;
        }
    }
    public function hideComments()
    {
        $this->commentSize = 0;
    }

}
