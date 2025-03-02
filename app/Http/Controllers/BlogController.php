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

        $request->validate([
            'titulo' => 'required|min:3',
        ]);

        //Este guarda
        /*
         * Tu misión es pillar los datos de la request y sustituirlos por los que tenemos a escritos a mano
         */

        $blog = new Blog();
        $blog->title = $titulo;
        $blog->text = $textoBlog;
        $blog->user_id = 1; //no vas a poder sin login, se hace después
        $blog->save();

        return redirect()->route('blog.index');

        //extra: haz una redireccion
    }

    public function index()
    {
        return view('blog.index', ['blogs' => Blog::all()]);
    }
}
