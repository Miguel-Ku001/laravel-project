<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index() {
        /*foreach (Estado::get() as $estado) {
            echo "<B>".$estado->NOMBRE."</B><br>";
        }*/

        return view('grafica');
    }

    // public function showMap() {
    //     return view('chart');
    // }
}
