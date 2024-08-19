<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Usamos el método 'with' para cargar la relación con la categoría y aplicamo la paginacion
        $products = Product::with('category')->paginate(6);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories = Category::all(); // Obtener todas las categorías
        return view('products.create', compact('categories')); //Pasamos el listado de categorias a la vista create
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* dd($request->all()); */

        //Validar datos del formulario
        $request->validate([

            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            
        ]);



        //si pasa la validacion creamos el registro
        $product = new Product();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->user_id = Auth::id(); // Guardar el ID del usuario autenticado
        $product->save();

        //Redirecionamos a products.index
        return redirect()->route('products.index')->with('success', 'Producto creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
         // Obtenemos la información del usuario que creó la categoría
         $user = $product->user;

        return view('products.show', compact('product', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)

    {
         // Obtener todas las categorías para el select
         $categories = Category::all();

         /* dd($category->toArray()); */

        return view('products.edit', compact('product', 'categories'));
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
