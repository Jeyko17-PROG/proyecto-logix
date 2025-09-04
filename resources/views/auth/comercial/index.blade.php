<!-- Menú desplegable Comercial -->
<div>
    <button @click="openComercial = !openComercial"
        class="w-full flex justify-between items-center px-3 py-2 rounded-lg hover:bg-gray-100 transition">
        <span>Comercial</span>
        <svg :class="{ 'rotate-180': openComercial }" 
             class="w-4 h-4 transform transition-transform"
             fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <!-- Submenú -->
    <ul x-show="openComercial" x-transition class="ml-4 mt-2 space-y-2">
        <li>
            <a href="{{ route('comercial.proveedores.index') }}"
               class="block px-3 py-2 rounded-lg hover:bg-gray-100">
               Proveedores
            </a>
        </li>
        <li>
            <a href="#"
               class="block px-3 py-2 rounded-lg hover:bg-gray-100">
               Clientes
            </a>
        </li>
    </ul>
</div>
