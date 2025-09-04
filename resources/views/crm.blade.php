
{{-- resources/views/crm.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-blue-600 mb-6">Módulo CRM</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <p class="text-gray-700">
            Bienvenido al módulo de <strong>CRM</strong>.  
            Aquí podrás gestionar las relaciones con los clientes, visualizar información de contactos y administrar oportunidades de negocio.
        </p>

        <div class="mt-6">
            <a href="{{ route('dashboard') }}" 
               class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                ← Volver al Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
