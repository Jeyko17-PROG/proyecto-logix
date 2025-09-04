@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Bienvenido a Mi Plataforma</h1>
    <p class="text-gray-700">
        Esta es la página de inicio. Desde aquí puedes acceder a los diferentes módulos:
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        </a>
       <a href="{{ route('inventario.index') }}" 
          class="p-4 bg-green-100 hover:bg-green-200 text-center rounded-lg shadow">
            Inventario
        </a>
       <a href="{{ route('crm.index') }}" 
          class="p-4 bg-purple-100 hover:bg-purple-200 text-center rounded-lg shadow">
            CRM
        </a>
        <a href="{{ route('rh.index') }}" 
           class="p-4 bg-yellow-100 hover:bg-yellow-200 text-center rounded-lg shadow">
            Recursos Humanos
        </a>
        <a href="{{ route('dashboard') }}" 
           class="p-4 bg-gray-100 hover:bg-gray-200 text-center rounded-lg shadow">
            Dashboard
        </a>
    </div>
</div>
@endsection
@vite('resources/css/app.css')
