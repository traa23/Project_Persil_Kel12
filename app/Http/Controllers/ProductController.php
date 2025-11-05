<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Ini versi modul
    /*public function index()
    {
        // server-side pagination Laravel
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }*/

    public function index()
    {
        // Ambil data produk, urut berdasarkan id dari terkecil ke terbesar, dengan pagination 10 data per halaman
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }


        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }


        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Product updated.');
    }

    /*public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}*/

    public function destroy(Product $product)
    {
        $product->delete();

        // Reset ID agar berurutan kembali
        $products = Product::orderBy('id')->get();
        $i = 1;
        foreach ($products as $item) {
            $item->id = $i++;
            $item->save();
        }

        // Reset auto increment
        \DB::statement('ALTER TABLE products AUTO_INCREMENT = 1');

        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
}