<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

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

    public function edit(Product $product)
    {
        return view('project.admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'thumbnail' => 'image|nullable',
        ]);

        $thumbnailPath = $product->thumbnail;
        if($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'thumbnail' => $thumbnailPath,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}