@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Dashboard</h1>
    <p class="text-gray-700">
        Aquí encontrarás un resumen de tus actividades y accesos rápidos a los módulos principales.
    </p>

    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="p-4 bg-blue-50 rounded-lg shadow">
            <h2 class="font-semibold text-lg text-blue-800">Últimas Actividades</h2>
            <ul class="mt-2 list-disc list-inside text-gray-600">
                <li>Se creó una nueva oportunidad en CRM</li>
                <li>Inventario actualizado</li>
                <li>Nuevo usuario registrado en RH</li>
            </ul>
        </div>

        <div class="p-4 bg-green-50 rounded-lg shadow">
            <h2 class="font-semibold text-lg text-green-800">Accesos Rápidos</h2>
            <div class="flex flex-col space-y-2 mt-2">
                <a href="{{ route('inventario.index') }}">Inventario</a>
                <a href="{{ route('crm.index') }}">CRM</a>
                <a href="{{ route('rh.index') }}">Recursos Humanos</a>

            </div>
        </div>
    </div>
</div>
@endsection
@vite('resources/css/app.css')