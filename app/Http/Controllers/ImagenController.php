<?php

namespace App\Http\Controllers;

use File;
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


        if(!File::exists(public_path("uploads"))){
            File::makeDirectory(public_path("uploads"), 0777, true, true);
        }

        $imagenPath = public_path("uploads/{$nombreImagen}");

        $imagenServidor->save($imagenPath);
        return response()->json(['image'=> $nombreImagen]);
    }
}
