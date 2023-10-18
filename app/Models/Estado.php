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
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $attributes = ['poblacion', 'nombre', 'code'];

    public function confirmados() {
        return $this->hasMany(Confirmado::class, 'ESTADO_ID');
    }
    
}