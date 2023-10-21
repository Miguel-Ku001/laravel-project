<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Defuncion;
use App\Models\Estado;

class DefuncionController extends Controller
{
    // public function totalDefunciones() {
    //     $totalSumDefunciones = Defuncion::sum('CASOS');
    //     return $totalSumDefunciones;
    // }

    public function getCasosDefunciones(){
        $defunciones = Defuncion::all();
        $totalCasos = $defunciones->sum('CASOS');
        echo "Casos defunciones: ".$totalCasos;
    }

    public function getCasosDefuncionesEstado($idEstado) {
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->defunciones->sum('CASOS');
        echo "Defunciones de: ".$estado->NOMBRE.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->defunciones->sum('CASOS');
            $totalCasos += $casosE;
            echo "<B>".$estado->NOMBRE."</B> :".$casosE."<br>";
        }
        echo "</br><B>Casos de defunciones totales: </B> ".$totalCasos;
    }

    public function index() {
        echo "<B> SUMA DE CASOS DE DEFUNCIONES POR ESTADO </B><br><br>";
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosDefuncionesEstado($idEstado);
    }

    public function getDefunciones(){
        return response()->json(Defuncion::get());
    }
}