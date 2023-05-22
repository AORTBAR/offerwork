<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class EmpresasController extends Controller
{

    public function generatePDF()
    {
        $empresas = Empresa::all();
    
        // Crear una instancia de Dompdf con las opciones predeterminadas
        $dompdf = new Dompdf();
    
        // Obtener el contenido HTML de la vista 'empresas.pdf'
        $html = View::make('empresas-pdf', compact('empresas'))->render();
    
        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);
    
        // Renderizar el PDF
        $dompdf->render();
    
        // Descargar el PDF en el navegador
        return $dompdf->stream('listado_empresas.pdf');
    }


    public function mayorOfertas(Request $request)
{
    $empresa = Empresa::withCount('ofertas')->orderBy('ofertas_count', 'desc')->first();
    return response()->json($empresa);
}
   

public function index()
{
    $empresas = Empresa::orderBy('id', 'asc')->paginate(10);
    return view('empresasindex', compact('empresas'));
}

    public function create()
    {
        return view('empresascreate');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|max:100',
            'direccion' => 'required|max:200',
            'mail' => 'required|email|max:100',
        ]);

        // Crear una nueva empresa con los datos del formulario
        $empresa = new Empresa();
        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->mail = $request->input('mail');
        $empresa->save();

        // Redirigir a la lista de empresas con un mensaje de éxito
        return redirect()->route('empresas.index')
                         ->with('success', 'La empresa se ha creado correctamente.');
    }

    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, Empresa $empresa)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|max:100',
            'direccion' => 'required|max:200',
            'mail' => 'required|email|max:100',
        ]);

        // Actualizar los datos de la empresa con los datos del formulario
        $empresa->nombre = $request->input('nombre');
        $empresa->direccion = $request->input('direccion');
        $empresa->mail = $request->input('mail');
        $empresa->save();

        // Redirigir a la lista de empresas con un mensaje de éxito
        return redirect()->route('empresas.index')
                         ->with('success', 'La empresa se ha actualizado correctamente.');
    }

    public function delete(Request $request, $id)
    {
        // Eliminar la empresa de la base de datos
        $empresa =Empresa::find($id);
        $empresa->delete();
    
        return redirect()->back()->with('success', 'empresa eliminado exitosamente.');
    }
    
    //
}
