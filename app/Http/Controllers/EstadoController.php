<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
//use Illuminate\View\View;

class EstadoController extends Controller
{
    public function show(string $id)
    {
        //dd(Estado::find($id));

        echo "<B>".Estado::find($id)->NOMBRE."</B><br>";
    }

    public function index() {
        /*foreach (Estado::get() as $estado) {
            echo "<B>".$estado->NOMBRE."</B><br>";
        }*/

        return view('estados.index');
    }

    public function getEstados(){
        return response()->json(Estado::get());
    }
}