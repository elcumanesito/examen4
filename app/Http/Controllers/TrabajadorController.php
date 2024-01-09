<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    public function index()
    {
        $trabajadores = Trabajador::all();
        return response()->json($trabajadores, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required|date',
            'num_documento' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
        ]);

        $trabajador = Trabajador::create($request->all());
        return response()->json($trabajador, 201);
    }

    public function show($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        return response()->json($trabajador, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required|date',
            'num_documento' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
        ]);

        $trabajador = Trabajador::findOrFail($id);
        $trabajador->update($request->all());
        return response()->json($trabajador, 200);
    }

    public function destroy($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $trabajador->delete();
        return response()->json(null, 204);
    }
}
