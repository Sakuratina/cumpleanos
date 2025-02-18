<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //BREAD browse read edit add delete
    public function create()
    {
        $blog = new Blog();
        $blog->title = 'BLOG';
        $blog->text = 'TEXTO';
        $blog->user_id = 1;
        $blog->save();

    }

    public function index()
    {
        return view('blog.index',['blogs'=>Blog::all()]);
    }
}
