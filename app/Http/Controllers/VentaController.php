<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return response()->json($ventas, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'idcliente' => 'required|exists:clientes,idcliente',
            'idtrabajador' => 'required|exists:trabajadores,idtrabajador',
            'idproducto' => 'required|exists:productos,idproducto',
            'fecha' => 'required|date',
        ]);

        $venta = Venta::create($request->all());
        return response()->json($venta, 201);
    }

    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return response()->json($venta, 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idcliente' => 'exists:clientes,idcliente',
            'idtrabajador' => 'exists:trabajadores,idtrabajador',
            'idproducto' => 'exists:productos,idproducto',
            'fecha' => 'date',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($request->all());
        return response()->json($venta, 200);
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return response()->json(null, 204);
    }
}
