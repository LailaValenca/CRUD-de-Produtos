<?php

namespace App\Http\Controllers;

use App\Models\Product; // Importa o Model Product para que possamos usá-lo
use Illuminate\Http\Request; // Importa a classe Request para lidar com dados de formulário

class ProductController extends Controller
{
    /**
     * Mostra uma lista de todos os produtos.
     */
    public function index()
    {
        // Pega todos os produtos do banco de dados, dos mais recentes para os mais antigos
        $products = Product::latest()->get(); 
        
        // Retorna a view 'products.index' e passa a variável $products para ela
        return view('products.index', compact('products'));
    }

    /**
     * Mostra o formulário para criar um novo produto.
     */
    public function create()
    {
        // Apenas retorna a view que contém o formulário de criação
        return view('products.create');
    }

    /**
     * Salva um novo produto no banco de dados.
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        // Cria um novo produto no banco com os dados validados
        Product::create($request->all());

        // Redireciona o usuário de volta para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('products.index')
                         ->with('success', 'Produto criado com sucesso.');
    }

    /**
     * Mostra o formulário para editar um produto existente.
     * O Laravel automaticamente encontra o Product pelo ID na URL (Route-Model Binding)
     */
    public function edit(Product $product)
    {
        // Retorna a view de edição, passando o produto que queremos editar
        return view('products.edit', compact('product'));
    }

    /**
     * Atualiza um produto existente no banco de dados.
     */
    public function update(Request $request, Product $product)
    {
        // Valida os dados recebidos do formulário de edição
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        // Atualiza o produto no banco com os novos dados
        $product->update($request->all());

        // Redireciona para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('products.index')
                         ->with('success', 'Produto atualizado com sucesso.');
    }

    /**
     * Remove um produto do banco de dados.
     */
    public function destroy(Product $product)
    {
        // Deleta o produto do banco
        $product->delete();

        // Redireciona para a lista de produtos com uma mensagem de sucesso
        return redirect()->route('products.index')
                         ->with('success', 'Produto excluído com sucesso.');
    }
}