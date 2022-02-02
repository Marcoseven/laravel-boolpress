<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function posts(Tag $tag)
    {
        $posts = $tag->posts()->orderByDesc('id')->paginate(10);
        return view('guest.tags.posts', compact('posts', 'tag'));
    }
}
