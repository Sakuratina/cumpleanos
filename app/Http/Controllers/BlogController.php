<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //BREAD browse read edit add delete
    public function create()
    {
        //este enseña un formulario
        return view('blog.create');
    }

    public function store(BlogStoreRequest $request)
    {
        $titulo = $request->input('titulo');
        $textoBlog = $request->input('textoBlog');
        $ruta = $request->file('archivo')->store('archivos', 'public');

        $request->validate([
            'titulo' => 'required|min:3',
        ]);
        $blog = new Blog();
        $blog->title = $titulo;
        $blog->text = $textoBlog;
        $blog->foto = $ruta;
        $blog->user_id = auth()->id();
        $blog->save();

        return redirect()->route('blog.index');
    }

    public function index()
    {
        return view('blog.index', ['blogs' => Blog::with('user')->paginate(3)]);//precargar la relación user para to lo que venga
    }
}
