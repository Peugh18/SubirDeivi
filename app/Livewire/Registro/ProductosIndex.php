<?php

namespace App\Livewire\Registro;

use Livewire\Component;

class ProductosIndex extends Component
{
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

    public function render()
    {
        return view('livewire.registro.productos-index');
    }

    public function eliminarProducto($index): void
    {
        unset($this->productos[$index]);
        $this->productos = array_values($this->productos);
    }
} 