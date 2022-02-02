<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts(Category $category)
    {
        $posts = $category->posts()->orderBy('id')->paginate(10);
        return view ('guest.categories.posts', compact('posts', 'category'));
    }
}
