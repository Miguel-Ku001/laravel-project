<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Confirmado;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';
    protected $primaryKey = 'ID';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['POBLACION', 'NOMBRE', 'codigo_nombre'];

    public function confirmados(): HasMany {
        return $this->hasMany(Confirmado::class);
    }
    
}