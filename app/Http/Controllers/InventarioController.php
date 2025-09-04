<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Muestra una lista del inventario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::all();
        return view('inventario.index', compact('inventarios'));
    }

    /**
     * Guarda un nuevo equipo en el inventario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'equipo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'serial' => 'required|string|max:255|unique:inventarios',
            'cantidad' => 'required|integer|min:0',
            'faltantes' => 'nullable|integer|min:0',
        ]);

        Inventario::create($request->all());

        return redirect()->back()->with('success', 'Equipo agregado correctamente.');
    }

    /**
     * Actualiza un equipo existente en el inventario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:0',
        ]);

        $inventario->update([
            'cantidad' => $request->cantidad,
            'faltantes' => $request->faltantes ?? $inventario->faltantes,
        ]);

        return redirect()->back()->with('success', 'Inventario actualizado.');
    }

    /**
     * Elimina un equipo del inventario.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->back()->with('success', 'Equipo eliminado.');
    }
}