<?php

namespace App\Http\Controllers;
use App\Models\Sospechoso;

use Illuminate\Http\Request;

class SospechosoController extends Controller
{
    public function totalSospechosos() {
        $totalSumNegativos = Sospechoso::sum('CASOS');
        return $totalSumNegativos;
    }
}