<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Aplicamos la Paginacion por 8 items las cuales se reflejaran en la vista index
        $categories = Category::paginate(6);
        /* $categories = Category::all(); */
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

        $category = new Category();
        $category->name = $request->input('name');
        $category->user_id = Auth::id(); // Guardar el ID del usuario autenticado
        $category->save();

        //Redirecionamos a products.index
        return redirect()->route('categories.index')->with('success', 'Categoria Creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Obtenemos la información del usuario que creó la categoría
         $user = $category->user;

        return view('categories.show', compact('category', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         //Validar datos del formulario
         $request->validate([

            'name'=>'required',
           
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

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
