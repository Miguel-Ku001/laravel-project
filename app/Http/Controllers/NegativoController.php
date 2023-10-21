<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negativo;
use App\Models\Estado;

class NegativoController extends Controller
{
    
    public function getCasosNegativos(){
        $negativos = Negativo::all();
        $totalCasos = $negativos->sum('CASOS');
        echo "Casos negativos: ".$totalCasos;
    }

    public function getCasosNegativosEstado($idEstado) {
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->negativos->sum('CASOS');
        echo "Casos negativos de ".$estado->NOMBRE.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->negativos->sum('CASOS');
            $totalCasos += $casosE;
            echo "<B>".$estado->NOMBRE."</B>: "."".$casosE."<br>";
        }
        echo "</br><B>Casos negativos totales:</B> ".$totalCasos;
    }

    public function index() {
        echo "<B> SUMA DE CASOS NEGATIVOS POR ESTADO </B><br><br>";
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosNegativosEstado($idEstado);
    }

    public function getNegativos(){
        return response()->json(Negativo::get());
    }

}