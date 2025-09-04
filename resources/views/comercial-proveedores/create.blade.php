@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Registrar Proveedor</h1>

    <form action="{{ route('comercial.proveedores.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre" class="w-full border p-2" required>
        <input type="text" name="nit" placeholder="NIT" class="w-full border p-2">
        <input type="text" name="documento" placeholder="Número de Documento" class="w-full border p-2">
        <input type="text" name="direccion" placeholder="Dirección" class="w-full border p-2">
        <input type="text" name="telefono" placeholder="Teléfono" class="w-full border p-2">
        <input type="email" name="correo" placeholder="Correo" class="w-full border p-2">

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
        <a href="{{ route('comercial.proveedores.index') }}" class="ml-2 text-gray-600">Cancelar</a>
    </form>
</div>
@endsection
