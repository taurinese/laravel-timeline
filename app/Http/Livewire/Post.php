<?php

namespace App\Http\Livewire;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Post extends Component
{
    public $post;

    public $isLiked;


    public function mount($post)
    {
        $this->post = $post;
        $this->isLiked = Like::where('post_id', $post->id)->where('user_id', Auth::id())->first() ? true : false;
    }

    public function likePost($postId){
        $this->isLiked = true;
        $this->emit('likeAdded', $postId);
    }

    public function render()
    {   
        return view('livewire.post');
    }

}
