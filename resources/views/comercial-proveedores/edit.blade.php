@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Proveedor</h1>

    <form action="{{ route('comercial.proveedores.update', $proveedor->id) }}" 
          method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="nombre" value="{{ $proveedor->nombre }}" class="w-full border p-2" required>
        <input type="text" name="nit" value="{{ $proveedor->nit }}" class="w-full border p-2">
        <input type="text" name="documento" value="{{ $proveedor->documento }}" class="w-full border p-2">
        <input type="text" name="direccion" value="{{ $proveedor->direccion }}" class="w-full border p-2">
        <input type="text" name="telefono" value="{{ $proveedor->telefono }}" class="w-full border p-2">
        <input type="email" name="correo" value="{{ $proveedor->correo }}" class="w-full border p-2">

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">Actualizar</button>
        <a href="{{ route('comercial.proveedores.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
@endsection
