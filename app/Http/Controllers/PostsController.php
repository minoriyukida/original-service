<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostsController extends Controller
{
     public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
            $data += $this->counts($user);
        }
       return view('welcome', $data);
    }
    
     public function store(Request $request)
    {  
        $this->validate($request, [
        'title' => 'required|max:191',
            'content' => 'required|max:191',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        $id=\Auth::id();
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        
         $data = [
            'user' => $user,
            'posts' => $posts,
        ];

        $data += $this->counts($user);
        
        return redirect('/');

    }
    
    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return back();
    }
    
     public function create()
    {
        $post = new Post;

        return view('posts.create', [
            'post' => $post,
        ]);
    }
}
