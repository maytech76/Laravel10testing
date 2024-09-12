<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    
    public function index() {
        // Usamos el método 'with' para cargar la relación con la categoría y aplicamo la paginacion
        $products = Product::with('category')->paginate(6);

        return view('products.index', compact('products'));
    }

    
    public function create(){
        $categories = Category::all(); // Obtener todas las categorías
        return view('products.create', compact('categories')); //Pasamos el listado de categorias a la vista create
    }

   
    public function store(Request $request){
            /*  dd($request->all()); */

            //Validar datos del formulario
            $request->validate([

                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'category_id' => 'required|exists:categories,id',
                'stock' => 'required|integer|min:0',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                
                
            ]);

        

            $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');

            
        }



        //si pasa la validacion creamos el registro
        $product = new Product();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->user_id = Auth::id(); // Guardar el ID del usuario autenticado
        $product->image_path = $imagePath;
        $product->save();

        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Exitoso..!!",
            'icon' => "success",
            'showConfirmButton'=> false,
            'timer'=> 1700
         ]);

        //Redirecionamos a products.index
        return redirect()->route('products.index')->with('success', 'Producto creado');
    }

   
    public function show(Product $product){
         // Obtenemos la información del usuario que creó el producto
         $user = $product->user;

        return view('products.show', compact('product', 'user'));
    }

    


    public function edit(Product $product){
         // Obtener todas las categorías para el select
         $categories = Category::all();

         /* dd($category->toArray()); */

        return view('products.edit', compact('product', 'categories'));
    }

   
    public function update(Request $request, Product $product){
        //Validar datos del formulario
        $request->validate([
            'name'=>'required',
            'description' => 'required',
            'category_id' => 'required',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    

       // Manejo de la imagen
       if ($request->hasFile('image')) {
            // Si hay una nueva imagen, la guardamos y eliminamos la imagen anterior si existe
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
        }

        // Guardar la nueva imagen
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image_path = $imagePath;
      }

        // Actualizar los demás campos
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');

        // Guardar los cambios
        $product->save();


        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Actualizado..!!",
            'icon' => "success",
            'showConfirmButton'=> false,
            'timer'=> 1700
         ]);

        //Redirecionamos a products.index
        return redirect()->route('products.index')->with('success', 'Producto Actualizado');
    }

    

    public function destroy(Product $product){
        //Eliminamos un registro especifico
        $product->delete();


        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Eliminado, Proceso Inrebersible..!!",
            'icon' => "warning",
            'showConfirmButton'=> false,
            'timer'=> 2000
         ]);

        //Redirecionamos a products.index
        return redirect()->route('products.index')->with('success', 'Producto Eliminado');
    }
}
