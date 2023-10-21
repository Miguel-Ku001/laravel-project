<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmado;
use App\Models\Estado;

class ConfirmadoController extends Controller
{
    
    public function getCasosConfirmados(){
        $confirmados = Confirmado::all();
        $totalCasos = $confirmados->sum('CASOS');
        echo "Casos confirmados: ".$totalCasos;
    }

    public function getCasosConfirmadosEstado($idEstado) {
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->confirmados->sum('CASOS');
        //echo $totalCasos;
        echo "Casos confirmados de ".$estado->NOMBRE.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estados as $estado) {
            $casosE = $estado->confirmados->sum('CASOS');
            $totalCasos += $casosE;
            echo "<B>".$estado->NOMBRE."</B> :".$casosE."<br>";
        }
        echo "</br><B>Casos totales confirmados:</B> ".$totalCasos;
    }

    public function index() {
        echo "<B> SUMA DE CASOS CONFIRMADOS POR ESTADO </B><br><br>";
        self::getCasosDesglosados();
    }
    
    public function show($idEstado){
        self::getCasosConfirmadosEstado($idEstado);
    }

    public function getConfirmados(){
        return response()->json(Confirmado::get());
    }

}