{{-- resources/views/rh.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-green-600 mb-6">Módulo Recursos Humanos</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <p class="text-gray-700">
            Bienvenido al módulo de <strong>Recursos Humanos</strong>.  
            Aquí podrás gestionar la información del personal, realizar seguimiento de procesos internos y administrar la documentación de los empleados.
        </p>

        <div class="mt-6">
            <a href="{{ route('dashboard') }}" 
               class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                ← Volver al Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
