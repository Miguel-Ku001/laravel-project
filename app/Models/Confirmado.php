<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Estado;

class Confirmado extends Model
{
    protected $table = 'confirmados';
    //protected $primaryKey = 'ESTADO_ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['ESTADO_ID', 'FECHA', 'CASOS'];

    public function estado(): BelongsTo {
        return $this->belongsTo(Estado::class);
    }
}