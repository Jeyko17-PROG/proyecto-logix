@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Mis Tareas</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
        Nueva Tarea
    </a>

    <table class="table-auto w-full mt-6">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-4 py-2">Título</th>
                <th class="px-4 py-2">Descripción</th>
                <th class="px-4 py-2">Vencimiento</th>
                <th class="px-4 py-2">Prioridad</th>
                <th class="px-4 py-2">Completada</th>
                <th class="px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                {{-- Bloque PHP para definir la clase de color según la prioridad --}}
                @php
                    $bgColorClass = match($task->priority) {
                        'alta' => 'bg-red-100',
                        'media' => 'bg-yellow-100',
                        'baja' => 'bg-green-100',
                        default => '',
                    };
                @endphp

                {{-- La fila de la tabla ahora usa la clase de Tailwind en lugar del style --}}
                <tr class="border-b {{ $bgColorClass }}">
                    <td class="px-4 py-2">{{ $task->title }}</td>
                    <td class="px-4 py-2">{{ $task->description }}</td>
                    <td class="px-4 py-2">{{ $task->due_date }}</td>
                    <td class="px-4 py-2 capitalize">{{ $task->priority }}</td>
                    <td class="px-4 py-2">{{ $task->completed ? 'Sí' : 'No' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-500 text-white font-bold py-1 px-3 rounded hover:bg-yellow-600 text-sm">
                            Editar
                        </a>

                        {{-- El formulario ahora usa la clase 'inline-block' en lugar del style --}}
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white font-bold py-1 px-3 rounded hover:bg-red-700 text-sm"
                                    onclick="return confirm('¿Eliminar esta tarea?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection