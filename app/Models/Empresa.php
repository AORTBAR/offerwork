<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Ofertas;


class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'nombre',
        'direccion',
        'mail'
    ];

    function obtenerRankingEmpresas()
    {
        // Obtén los datos de las empresas y la cantidad de ofertas utilizando una consulta SQL
        $empresas = Empresa::select('empresas.nombre', DB::raw('COUNT(ofertas.id) as total_ofertas'))
            ->leftJoin('ofertas', 'empresas.id', '=', 'ofertas.empresa_id')
            ->groupBy('empresa.id', 'empresas.nombre')
            ->orderBy('total_ofertas', 'desc')
            ->get();
    
        // Crea un arreglo para almacenar los datos de las empresas y sus ofertas
        $rankingEmpresas = [];
    
        // Recorre los resultados y agrega los datos al arreglo
        foreach ($empresas as $empresa) {
            $rankingEmpresas[] = [$empresa->nombre, $empresa->total_ofertas];
        }
    
        return $rankingEmpresas;
    }



    // Relación con la tabla de ofertas
    public function ofertas()
{
    return $this->hasMany(Ofertas::class);
}
}
