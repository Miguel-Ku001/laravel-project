<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sospechoso;
use App\Models\Estado;

class SospechosoController extends Controller
{
    public function getCasosSospechosos(){
        $sospechosos = Sospechoso::all();
        $totalCasos = $sospechosos->sum('CASOS');
        echo "Casos sospechosos: ".$totalCasos;
    }

    public function getCasosSospechososEstado($idEstado) {
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->sospechosos->sum('CASOS');
        echo "Casos sospechosos de ".$estado->NOMBRE.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->sospechosos->sum('CASOS');
            $totalCasos += $casosE;
            echo "<B>".$estado->NOMBRE."</B>: "."".$casosE."<br>";
        }
        echo "</br><B>Casos sospechosos totales:</B> ".$totalCasos;
    }

    public function index() {
        echo "<B> SUMA DE CASOS SOSPECHOSOS POR ESTADO </B><br><br>";
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosSospechososEstado($idEstado);
    }

    public function getSospechosos(){
        return response()->json(Negativo::get());
    }

    // public function totalSospechosos() {
    //     $totalSumNegativos = Sospechoso::sum('CASOS');
    //     return $totalSumNegativos;
    // }
}
