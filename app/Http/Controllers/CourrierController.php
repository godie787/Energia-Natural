<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

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
        try {
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
        } catch (QueryException $e) {
            return redirect()->route('courrier.agregar')->with('error', 'No se puede eliminar el courrier. Está asociado a una venta.');
        }
    }
    public function edit($id_courrier)
    {
        $user = auth()->user();
        // Encuentra el courrier por su ID
        $courrier = Courrier::find($id_courrier);

        // Verifica si el courrier existe
        if (!$courrier) {
            return redirect()->route('courrier.index')->with('error', 'Courrier no encontrado');
        }

        // Muestra la vista de edición con el courrier
        return view('courrier.edit', compact('courrier', 'user'));
    }
    public function update(Request $request, $id_courrier)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:50',
            'direccion' => 'required|string|max:80',
            'fono' => 'required|string|max:12',
        ]);

        // Encuentra el courrier por su ID
        $courrier = Courrier::find($id_courrier);

        // Verifica si el courrier existe
        if (!$courrier) {
            return redirect()->route('courrier.index')->with('error', 'Courrier no encontrado');
        }

        // Actualiza los datos del courrier
        $courrier->update([
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'fono' => $request->input('fono'),
        ]);

        // Redirige a la vista de edición con un mensaje de éxito
        return redirect()->route('courrier.edit', ['id_courrier' => $id_courrier])->with('success', 'Courrier actualizado exitosamente');
    }

}
