<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Listar proveedores
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('comercial.proveedores.index', compact('proveedores'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('comercial.proveedores.create');
    }

    // Editar proveedor
    public function edit(Proveedor $proveedor)
    {
        return view('comercial.proveedores.edit', compact('proveedor'));
    }

    // Guardar un nuevo proveedor
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:proveedors',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'nit' => 'nullable|string|max:50',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('comercial.proveedores.index')->with('success', 'Proveedor creado correctamente.');
    }

    // Actualizar proveedor
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:proveedors,correo,' . $proveedor->id,
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'nit' => 'nullable|string|max:50',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('comercial.proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    // Eliminar proveedor
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('comercial.proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }
}
