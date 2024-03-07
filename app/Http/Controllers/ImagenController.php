<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request)
    {

        $imagen = $request->file('file');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $imagenServidor = Image::read($imagen);
        $imagenServidor->cover(width: 1000, height:1000);

        $imagenPath = public_path("uploads"). '/' .$nombreImagen;
        $imagenServidor->save($imagenPath);
        return response()->json(['image'=> $nombreImagen]);
    }
}
