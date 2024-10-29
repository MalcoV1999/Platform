@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ __('Lista de Productos') }}</h1>

    <div class="mb-4">
        <a href="{{ route('product.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none">
            {{ __('Agregar Producto') }}
        </a>
    </div>

    <table class="min-w-full table-auto">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">{{ __('ID') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Nombre') }}</th>
                <th class="px-4 py-2 text-left">{{ __('SKU') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Estado') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Precio Puntos') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Categoría') }}</th>
                <th class="px-4 py-2 text-left">{{ __('Acciones') }}</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($products as $product)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $product->id }}</td>
                <td class="px-4 py-2">{{ $product->name }}</td>
                <td class="px-4 py-2">{{ $product->sku }}</td>
                <td class="px-4 py-2">
                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $product->status ? 'Activo' : 'Inactivo' }}
                    </span>
                </td>
                <td class="px-4 py-2">{{ $product->points_price }}</td>
                <td class="px-4 py-2">{{ $product->category->name }}</td>
                <td class="px-4 py-2 flex space-x-2">
                    <a href="{{ route('product.show', $product->id) }}" class="px-2 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">{{ __('Ver') }}</a>
                    <a href="{{ route('product.edit', $product->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">{{ __('Editar') }}</a>
                    <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">{{ __('Eliminar') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
