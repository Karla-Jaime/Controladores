<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class NoticiasController extends Controller
{
    public function lista() {
        $noticias = Noticia::all();

        $argumentos = array();
        $argumentos["noticias"] = $noticias;

        return view("noticias.lista", $argumentos);
    }

    public function detalles($id) {
       $noticia = Noticia::find($id);
  
        $argumentos = array();
        $argumentos["noticia"] = $noticia; 

        return view('noticias.detalles', $argumentos);
    }
}
