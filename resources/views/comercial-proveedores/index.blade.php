@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Listado de Proveedores</h1>

    <a href="{{ route('comercial.proveedores.create') }}" 
       class="bg-blue-500 text-white px-4 py-2 rounded">+ Nuevo Proveedor</a>

    <table class="min-w-full mt-6 bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nombre</th>
                <th class="px-4 py-2">Correo</th>
                <th class="px-4 py-2">Teléfono</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($proveedores as $proveedor)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $proveedor->nombre }}</td>
                    <td class="px-4 py-2">{{ $proveedor->correo }}</td>
                    <td class="px-4 py-2">{{ $proveedor->telefono }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('comercial.proveedores.edit', $proveedor->id) }}" 
                           class="text-yellow-600">Editar</a>

                        <form action="{{ route('comercial.proveedores.destroy', $proveedor->id) }}" 
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 ml-2"
                                    onclick="return confirm('¿Eliminar este proveedor?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center py-4">No hay proveedores registrados</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
