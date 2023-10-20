<?php

namespace App\Http\Controllers;
use App\Models\Negativo;

use Illuminate\Http\Request;

class NegativoController extends Controller
{
    public function totalNegativos() {
        $totalSumNegativos = Negativo::sum('CASOS');
        return $totalSumNegativos;
    }
}