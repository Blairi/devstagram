<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikeCommentary extends Component
{

    public $commentary;
    public $isLiked;
    public $likes;

    public function mount( $commentary )
    {
        $this->isLiked = $commentary->checkLike(auth()->user());
        $this->likes = $this->commentary->likes->count();
    }

    public function like()
    {
        if($this->commentary->checkLike( auth()->user() )){
            $this->commentary->likes()->where('user_id', auth()->user()->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        }
        else{
            $this->commentary->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.like-commentary');
    }
}
