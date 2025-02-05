<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return PostResource::collection(Post::query()->paginate(15));
    }

    public function show(Post $post)
    {
        return Post::query()->findOrFail($post);
    }
}
