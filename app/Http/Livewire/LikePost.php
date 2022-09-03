<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLike;
    public $likes;

    public function mount($post)
    {
        $this->isLike = $post->checkLike( auth()->user() );
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if($this->post->checkLike( auth()->user() ))
        {
            auth()->user()->likes()->where("post_id", $this->post->id)->delete();
            $this->isLike = false;
            $this->likes--;
        }else{
            $this->post->likes()->create([
                'user_id'=> auth()->user()->id
            ]);
            $this->isLike = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
