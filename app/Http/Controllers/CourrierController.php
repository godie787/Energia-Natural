<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourrierController extends Controller
{
    public function index(){

        $courriers = Courrier::all();
        $user = auth()->user();
        return view('courrier.index', compact('user', 'courriers'));
    }

    public function create()
    {
        $courriers = Courrier::all();
        $user = auth()->user();
        return view('courrier.create', compact('user', 'courriers'));
    }
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:50',
            'direccion' => 'required|string|max:80',
            'fono' => 'required|string|max:12',
        ]);

        // Crea el nuevo courrier
        Courrier::create([
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'fono' => $request->input('fono'),
        ]);

        // Redirige a la misma página de creación con un mensaje de éxito
        return redirect()->route('courrier.create')->with('success', 'Courrier creado exitosamente');
    }

    public function destroy($id_courrier)
    {
        // Encuentra el courrier por su ID
        $courrier = Courrier::find($id_courrier);

        // Verifica si el courrier existe
        if (!$courrier) {
            return redirect()->route('courrier.agregar')->with('error', 'Courrier no encontrado');
        }

        // Realiza la lógica para eliminar el courrier (puedes ajustar esto según tus necesidades)
        $courrier->delete();

        // Redirige a la página adecuada después de la eliminación
        return redirect()->route('courrier.agregar')->with('success', 'Courrier eliminado exitosamente');
    }
}
