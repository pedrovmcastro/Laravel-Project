<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(20);  
        //ao invés de mostrar todos os dados de uma vez utilizando o comando User::all();
        //com o paginate é possível definir quantos usuários serão mostrados por página

        return view('project.admin.products.index', compact('products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Lidar com o upload da imagem
        $filename = null;
        if ($request->hasFile('thumbnail')) {
            $filename = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $filename);
        }

        // Criar novo produto
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'thumbnail' => $filename,
        ]);

        return redirect()->route('welcome')->with('success', 'Produto criado com sucesso.');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('project.admin.products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        
        $product = Product::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'thumbnail' => 'image|nullable|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Lidar com o upload da imagem
        if ($request->hasFile('thumbnail')) {
            // Apagar a imagem antiga
            if ($product->thumbnail) {
                Storage::delete('public/thumbnails/' . $product->thumbnail);
            }
            $filename = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $filename);
            $product->thumbnail = $filename;
        }

        // Atualizar o produto
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'thumbnail' => $product->thumbnail,
        ]);

        return redirect()->route('welcome')->with('success', 'Produto atualizado com sucesso.');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Deleta a imagem do servidor, se existir
        if ($product->thumbnail) {
            Storage::delete('public/thumbnails/' . $product->thumbnail);
        }

        // Deleta o produto do banco de dados
        $product->delete();

        return redirect()->route('welcome')->with('success', 'Produto deletado com sucesso');

    }
}