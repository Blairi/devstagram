<?php

namespace App\Http\Livewire;

use App\Models\Comentario;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Request;

class Comment extends Component
{

    public $post;
    public $comentario;
    public $comments;

    protected $rules = [
        'comentario' => 'required|max:254'
    ];

    public function comment()
    {

        $this->validate();

        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $this->post->id,
            'comentario' => $this->comentario
        ]);

        $this->reset('comentario'); // Reset form field

    }

    public function render()
    {
        $this->comments = Post::find($this->post->id)->comentarios;

        return view('livewire.comment', [
            'post' => $this->post,
            'comments' => $this->comments
        ]);
    }
}
