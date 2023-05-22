<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ofertas extends Model
{
    use HasFactory;

    
    protected $table = 'ofertas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'salario',
        'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
