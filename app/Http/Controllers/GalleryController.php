<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        $path = $request->file('file')->store('galleries', 'public'); // Guarda en storage/app/public/galleries

        return response()->json(['path' => asset('storage/' . $path)]);
    }
    public function showGallery()
    {
        $images = Storage::disk('public')->files('galleries');
        return view('blog.galeria', compact('images'));
    }


    public function destroy(Request $request)
    {
        $imagePath = $request->image;
        $disk=Storage::disk('public');
        if ($disk->exists($imagePath)) {
            $disk->delete($imagePath);
            return response()->json(['message' => 'Imagen eliminada correctamente']);
        }

        return response()->json(['error' => 'Imagen no encontrada'], 404);
    }

}
