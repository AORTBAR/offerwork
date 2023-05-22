<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Ofertas;

class UserController extends Controller
{


    
    public function index()
    {
        $empresas = Empresa::withCount('ofertas')->orderByDesc('ofertas_count')->get();

        return view('empleadosIndex', compact('empresas'));
    }

    public function actualizarDatosGrafico()
    {
        $empresas = Empresa::withCount('ofertas')->orderByDesc('ofertas_count')->get();
    
        $data = [['Empresa', 'Ofertas']];
        foreach ($empresas as $empresa) {
            $data[] = [$empresa->nombre, $empresa->ofertas_count];
        }
    
        return response()->json($data);
    }
}
