<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmado;
use App\Models\Estado;

class ConfirmadoController extends Controller
{
    /*public function show(string $id): View 
    {
        
        dd(Confirmado::find($id));
    }

    public function totalConfirmados() {
        $totalSumConfirmados = Confirmado::sum('CASOS');
        return $totalSumConfirmados;
    }*/

    /*public function confirmadosPorEstado() {
        $estados = Estado::all();
        $casosPorEstado = [];

        foreach ($estados as $estado) {
            $casosPorEstado[$estado->id] = [
                'confirmados' => Confirmado::sum('CASOS')
            ];
        }

        return $casosPorEstado;
    }*/

    public function getCasosConfirmados(){
        $confirmados = Confirmado::all();
        $totalCasos = $confirmados->sum('CASOS');
        echo "Casos confirmados: ".$totalCasos;
    }

    public function getCasosConfirmadosEstado($idEstado) {
        $estado = Estado::find($idEstado);
        $totalCasos = $estado->confirmados->sum('CASOS');
        echo $totalCasos;
        //echo "Casos confirmados de ".$estado->NOMBRE.": ".$totalCasos;
    }

    public function getCasosDesglosados() {
        $estados = Estado::all();
        $totalCasos = 0;
        foreach ($estado as $estados) {
            $casosE = $estado->confirmados->sum('CASOS');
            $totalCasos += $casosE;
            echo "Casos por el estado <B>".$estado->NOMBRE."</B> :".$casosE."<br>";
        }
        echo "Casos totales confirmados: ".$totalCasos;
    }

    public function index() {
        self::getCasosConfirmados();
    }
    
    public function show($idEstado){
        self::getCasosConfirmadosEstado($idEstado);
    }

}