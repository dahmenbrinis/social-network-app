<?php

namespace App\Livewire\Comments;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $post;
    public $commentSizeSteps;
    public $commentSize;
    public $canShowMore = false;

    public function getListeners(): array
    {
        return [
            "echo-private:commentsUpdated.{$this->post->id},CommentsEvent" => '$refresh',
            'commentAdded' => '$refresh',
        ];
    }

    public function render()
    {
        $comments = $this->post->comments()->orderByDesc('created_at')->take($this->commentSize)->get()->reverse();
        $this->canShowMore = (boolean)($comments->count() >= $this->commentSize) && ($comments->count() != 0);
        return view('livewire.comments.index', compact('comments'));
    }

    public function mount($post): void
    {
        $this->commentSizeSteps = 3;
        $this->commentSize = 0;
        $this->post = $post;
    }

    #[On('showMore')]
    public function showMore(): void
    {
        if ($this->post->comments->count() > $this->commentSize) {
            $this->commentSize += $this->commentSizeSteps;
        }
    }

    #[On('showComments')]
    public function showComments(Post $post): void
    {
        if ($this->post->id == $post->id) {
            $this->commentSize = ($this->commentSize == $this->commentSizeSteps) ? 0 : $this->commentSizeSteps;
        }
    }

    public function hideComments(): void
    {
        $this->commentSize = 0;
    }

}
