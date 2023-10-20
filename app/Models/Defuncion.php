<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defuncion extends Model
{
    protected $table = 'defunciones';
    protected $primaryKey = 'ESTADO_ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['FECHA', 'CASOS'];

    public function estado() {
        return $this->belongsTo(Estado::class);
    }
}