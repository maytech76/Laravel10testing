<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos del formulario
        $request->validate([
            'name'=>'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        //si pasa la validacion creamos el registro
        Product::create($request->all());

        //Redirecionamos a products.index
        return redirect()->route('products.index')->with('success', 'Producto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //Validar datos del formulario
        $request->validate([
            'name'=>'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $product->update($request->all());

        //Redirecionamos a products.index
        return redirect()->route('products.index')->with('success', 'Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //Eliminamos un registro especifico
        $product->delete();

        //Redirecionamos a products.index
        return redirect()->route('products.index')->with('success', 'Producto Eliminado');
    }
}
