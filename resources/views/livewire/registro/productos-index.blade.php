<?php

use Livewire\Volt\Component;

new class extends Component {
    public array $productos = [
        [
            'articulo' => 'Figma 033 - Asahina Mikuru',
            'medida' => '14cm',
            'precio' => '180',
            'estado' => 'A',
            'puntos' => '650'
        ],
        [
            'articulo' => 'Figma 001 - Rem',
            'medida' => '12cm',
            'precio' => '150',
            'estado' => 'B',
            'puntos' => '500'
        ]
    ];
}; ?>

<section class="w-full max-w-7xl mx-auto p-6">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <flux:heading size="xl" level="1">{{ __('Registro de Productos') }}</flux:heading>
            <flux:subheading size="lg" class="mb-4">{{ __('Lista de productos registrados') }}</flux:subheading>
        </div>
        
        <!-- BOTÓN AGREGAR - AQUÍ COLOCARÁS TU RUTA -->
        <a href="{{ route('productos.crear') }}" 
            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150"
        >
            {{ __('➕ Agregar Producto') }}
        </a>
    </div>

    <!-- Tabla de Productos -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Artículo') }}
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Medida') }}
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Precio') }}
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Estado') }}
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Puntos') }}
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Acciones') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($productos as $index => $producto)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $producto['articulo'] }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-white">
                                    {{ $producto['medida'] }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-green-600 dark:text-green-400">
                                    ${{ $producto['precio'] }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($producto['estado'] === 'A') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                    @elseif($producto['estado'] === 'B') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                    @elseif($producto['estado'] === 'C') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                    @else bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200
                                    @endif">
                                    {{ $producto['estado'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-purple-600 dark:text-purple-400">
                                    {{ $producto['puntos'] }} pts
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <flux:button 
                                    variant="danger" 
                                    size="sm"
                                    class="text-red-600 hover:text-red-900"
                                >
                                    🗑️ {{ __('Eliminar') }}
                                </flux:button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="text-gray-500 dark:text-gray-400">
                                    <div class="text-4xl mb-4">📦</div>
                                    <flux:heading size="md" class="mb-2">
                                        {{ __('No hay productos registrados') }}
                                    </flux:heading>
                                    <flux:text>
                                        {{ __('Comienza agregando tu primer producto') }}
                                    </flux:text>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Contador de productos -->
    @if(count($productos) > 0)
        <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
            {{ __('Total de productos:') }} <span class="font-medium">{{ count($productos) }}</span>
        </div>
    @endif
</section>

