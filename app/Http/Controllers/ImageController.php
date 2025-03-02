<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(Request $request)
    {
// Validar imagen
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

// Guardar la imagen en storage/app/public/images
        $path = $request->file('file')->store('public/images');

// Obtener la URL de la imagen
        $url = Storage::url($path);

        return response()->json(['url' => $url]);
    }
}
