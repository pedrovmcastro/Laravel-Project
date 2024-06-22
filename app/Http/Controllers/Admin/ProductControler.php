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

    public function create()
    {
        return view('project.admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'thumbnail' => 'image|nullable',
        ]);

        return redirect()->route('products.index');
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