@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-2xl">Produtos</h2>
        <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Novo Produto
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white">
        <thead class="bg-gray-200">
            <tr>
                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm text-left">Nome</th>
                <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm text-left">Preço</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-left">Descrição</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Ações</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @forelse($products as $product)
                <tr>
                    <td class="w-1/4 py-3 px-4">{{ $product->name }}</td>
                    <td class="w-1/4 py-3 px-4">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="py-3 px-4">{{ Str::limit($product->description, 50) }}</td>
                    <td class="py-3 px-4 text-center">
                        <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-500 hover:text-yellow-700 mx-2">Editar</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 mx-2" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4">Nenhum produto cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection