<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Amount;
use App\Models\Type;
use App\Models\Method;
use Cloudinary;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function create(Amount $amount,Type $type,Method $method)
    {
        return view('/posts/create')->with(['amounts' => $amount->get(),'types' => $type->get(),'methods' => $method->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
    $input = $request['post'];
    $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
    $input += ['image_url' => $image_url]; 
    $input += ['user_id' => $request->user()->id];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
    }
    
    public function show(Post $post)
    {
        return view('/posts/show')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
}
