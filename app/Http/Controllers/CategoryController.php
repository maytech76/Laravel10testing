<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener la última categoría registrada
        $lastCategory = Category::latest()->first();

        return view('categories.create', compact('lastCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validar datos del formulario
        $request->validate([
            'name'=>'required',
           
        ]);

        //si pasa la validacion creamos el registro
        Category::create($request->all());

        //Redirecionamos a products.index
        return redirect()->route('categories.index')->with('success', 'Categoria Creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $categories)
    {
         //Validar datos del formulario
         $request->validate([

            'name'=>'required',
           
        ]);

        $categories->update($request->all());

        //Redirecionamos a products.index
        return redirect()->route('categories.index')->with('success', 'Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        //Redirecionamos a categories.index
        return redirect()->route('categories.index')->with('success', 'Categoria Eliminada');
    }
}
