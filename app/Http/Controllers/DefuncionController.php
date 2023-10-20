<?php

namespace App\Http\Controllers;
use App\Models\Defuncion;

use Illuminate\Http\Request;

class DefuncionController extends Controller
{
    public function totalDefunciones() {
        $totalSumDefunciones = Defuncion::sum('CASOS');
        return $totalSumDefunciones;
    }
}