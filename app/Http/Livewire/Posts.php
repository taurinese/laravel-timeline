<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;
    
    protected $listeners = ["echo:posts,PostAdded" => "postAdded", "likeAdded"];

    protected $paginationTheme = 'bootstrap';

    /* public $posts; */

    public function postAdded($post)
    {
        /* $this->posts->prepend(Post::find($post)); */
        Post::latest()->paginate(10)->prepend(Post::find($post));

        session()->flash('status', "Post created");
    }

    public function likeAdded($postId)
    {
        DB::table('likes')->insert([
            'user_id' => Auth::id(),
            'post_id' => $postId
        ]);
    }

    /* public function mount()
    {
        $this->posts = Post::latest()->get();
    } */

    public function render()
    {
        $posts = Post::latest()->paginate(10);
        return view('livewire.posts', compact('posts'));

        /* return view('livewire.posts', ['posts' => Post::paginate(10)]); */
    }
}
