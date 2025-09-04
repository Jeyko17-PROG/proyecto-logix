<aside class="w-64 h-screen bg-white shadow-lg flex flex-col">

    <!-- Logo y rol -->
    <div class="h-28 flex flex-col items-center justify-center border-b">
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('logo-logix.png') }}" alt="Logix company logo" class="w-16 mb-2">
        </a>
        <a href="{{ route('dashboard') }}" class="text-lg font-bold text-blue-600">
            Logix
        </a>

        <!-- Rol del usuario -->
        @auth
            <p class="text-sm text-gray-500 font-semibold mt-1">
                @if(Auth::user()->role == 'administrativo')
                    Administrativo
                @elseif(Auth::user()->role == 'tecnico')
                    Técnico
                @elseif(Auth::user()->role == 'soporte')
                    Soporte
                @else
                    Usuario
                @endif
            </p>
        @endauth
    </div>

    <!-- Menú lateral -->
    <div class="flex-1 p-4 space-y-2">
        @auth
            @if(Auth::user()->role == 'administrativo')
                <!-- Inicio -->
                <a href="{{ route('dashboard') }}" 
                   class="block px-3 py-2 rounded-lg transition hover:bg-gray-100">
                     Inicio
                </a>

                <!-- Comercial (directo a proveedores) -->
                <a href="{{ route('comercial.proveedores.index') }}" 
                   class="block px-3 py-2 rounded-lg transition hover:bg-gray-100">
                    Comercial
                </a>

                <!-- Otros módulos -->
                <a href="{{ route('tecnicos.index') }}" 
                   class="block px-3 py-2 rounded-lg transition hover:bg-gray-100">
                    Técnicos
                </a>
                <a href="{{ route('inventario.index') }}" 
                   class="block px-3 py-2 rounded-lg transition hover:bg-gray-100">
                    Inventario
                </a>
                <a href="{{ route('crm.index') }}" 
                   class="block px-3 py-2 rounded-lg transition hover:bg-gray-100">
                    CRM
                </a>
                <a href="{{ route('rh.index') }}" 
                   class="block px-3 py-2 rounded-lg transition hover:bg-gray-100">
                    Recursos Humanos
                </a>
                <a href="{{ route('soporte.index') }}" 
                   class="block px-3 py-2 rounded-lg transition hover:bg-gray-100">
                    Soporte
                </a>
            @endif
        @endauth
    </div>

    <!-- Usuario -->
    <div class="border-t p-4">
        <p class="text-sm text-gray-600">Hola, {{ Auth::user()->name }}</p>
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button type="submit" class="w-full px-3 py-2 text-left rounded-lg text-red-500 hover:bg-red-100">
                Cerrar sesión
            </button>
        </form>
    </div>
</aside>
