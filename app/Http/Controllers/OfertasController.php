<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ofertas;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function generatePDF()
    {
        $ofertas = Ofertas::all();

        // Crear una instancia de Dompdf con las opciones predeterminadas
        $dompdf = new Dompdf();

        // Obtener el contenido HTML de la vista 'ofertas-pdf'
        $html = view('ofertas-pdf', compact('ofertas'))->render();

        // Cargar el contenido HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF en el navegador
        return $dompdf->stream('listado_ofertas.pdf');
    }


    public function index()
    {
        $ofertas = Ofertas::paginate(10);
        return view('ofertasIndex', compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ofertascreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'id' => 'required|unique:ofertas|numeric',
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'salario' => 'required|numeric',
            'empresa_id' => 'required|exists:empresas,id'
        ]);
    
        // Crear una nueva instancia del modelo Ofertas con los datos del formulario
        $oferta = new Ofertas();
        $oferta->id = $request->input('id');
        $oferta->titulo = $request->input('titulo');
        $oferta->descripcion = $request->input('descripcion');
        $oferta->salario = $request->input('salario');
        // Asignar el ID de la empresa correspondiente
        $oferta->empresa_id = $request->input('empresa_id');
        $oferta->save();
    
        // Redirigir a la página de visualización de la oferta creada con un mensaje de éxito
        return redirect()->route('ofertas.index', $oferta->id)
                         ->with('success', 'La oferta se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function showOfertas()
    {
        $users = Ofertas::paginate(10);
        return view('ofertasIndex', compact('ofertas'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtener la oferta por su ID
        $oferta = Ofertas::findOrFail($id);
    
        // Retornar la vista del formulario de edición con la oferta
        return view('ofertasedit', compact('oferta'));
    }
    /**
     * Update the specified resource in storage.
     */

    
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'salario' => 'required|numeric',
        ]);
    
        // Buscar el registro por su ID
        $oferta = Ofertas::find($id);
    
        if ($oferta) {
            // Actualizar los datos de la oferta con los datos del formulario
            $oferta->titulo = $validatedData['titulo'];
            $oferta->descripcion = $validatedData['descripcion'];
            $oferta->salario = $validatedData['salario'];
            $oferta->save();
    
            // Redirigir a la lista de ofertas con un mensaje de éxito
            return redirect()->route('ofertas.index')->with('success', 'La oferta se ha actualizado correctamente.');
        }
    
        // Redirigir a la lista de ofertas con un mensaje de error
        return redirect()->route('ofertas.index')->with('error', 'No se encontró la oferta especificada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el registro por su ID
        $oferta = Ofertas::find($id);
    
        if ($oferta) {
            // Eliminar el registro
            $oferta->delete();
    
            // Redirigir a la lista de ofertas con un mensaje de éxito
            return redirect()->back()->with('success', 'La oferta se ha eliminado correctamente.');
        }
    
        // Redirigir a la lista de ofertas con un mensaje de error
        return redirect()->back()->with('error', 'No se encontró la oferta especificada.');
    }
}
