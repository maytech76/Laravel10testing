<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Cartype;
use App\Models\Model_car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::with('cartype', 'brand', 'model_car')->paginate(6);

        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        $cartypes = Cartype::all(); // Solo obtener los nombres y ids
        $brands = Brand::all(); // Solo obtener los nombres y ids
        $modelcars = Model_car::all(); // Solo obtener los nombres y ids

       /*  dd($cartypes); */

         return view('cars.create', compact('cartypes', 'brands', 'modelcars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
       /*  dd($request->toArray());  */

        $request->validate([

            'cartype_id' =>'nullable|integer',
            'brand_id' =>'required|exists:brands,id',
            'model_car_id' =>'required|exists:model_cars,id',
            'year' => 'required',
            'traction'=> 'required',
            'color' => 'required',
            'position' => 'required',
            'fuel_type'=> 'required|string',
            'patent'=> 'required|string|min:6',
            'klm_to_day' => 'required|integer',
            'circulation_end'=> 'required|date',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('cars', 'public');
            
        }


        $car = new Car();
        $car->cartype_id = $request->input('cartype_id');
        $car->brand_id = $request->input('brand_id');  
        $car->model_car_id = $request->input('model_car_id');
        $car->year = $request->input('year');
        $car->traction = $request->input('traction');
        $car->color = $request->input('color');
        $car->position = $request->input('position');
        $car->fuel_type = $request->input('fuel_type');
        $car->patent = $request->input('patent');
        $car->klm_to_day = $request->input('klm_to_day');
        $car->circulation_end = $request->input('circulation_end');
        $car->image_path = $imagePath;  
        $car->save();

        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Exitoso..!!",
            'icon' => "success",
            'showConfirmButton'=> false,
            'timer'=> 1700
         ]);

         //Redirecionamos a products.index
         return redirect()->route('cars.index')->with('success', 'Vehiculo creado con Exito');


    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car) {
        return view('cars.show', compact('car'));

        /* dd($car->toarray()); */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car){
        $cartypes = Cartype::all(); // Listado de cartypes
        $brands = Brand::all(); // Lista de Brands
        $modelcars = Model_car::all(); // Listado de Modelos

    return view('cars.edit', compact('car', 'cartypes', 'brands', 'modelcars'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car){

        /* dd($request->toArray());  */

        $request->validate([
            'cartype_id' =>'nullable',
            'brand_id' =>'required',
            'model_car_id' =>'required',
            'year' => 'required',
            'traction'=> 'required',
            'color' => 'required',
            'position' => 'required',
            'fuel_type'=> 'required|string',
            'maintenance'=> 'required',
            'klm_to_day' => 'required',
            'circulation_end'=> 'required',
            'status'=> 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         

         // Manejo de la imagen
       if ($request->hasFile('image')) {

        // Si hay una nueva imagen, la guardamos y eliminamos la imagen anterior si existe
        if ($car->image_path) {
            Storage::disk('public')->delete($car->image_path);
        }

        // Guardar la nueva imagen
        $imagePath = $request->file('image')->store('cars', 'public');
        $car->image_path = $imagePath;

       }

        // Actualización de los datos del coche
        $car->cartype_id = $request->input('cartype_id');
        $car->brand_id = $request->input('brand_id');  
        $car->model_car_id = $request->input('model_car_id');
        $car->year = $request->input('year');
        $car->traction = $request->input('traction');
        $car->color = $request->input('color');
        $car->position = $request->input('position');
        $car->fuel_type = $request->input('fuel_type');
        $car->maintenance = $request->input('maintenance');
        $car->klm_to_day = $request->input('klm_to_day');
        $car->circulation_end = $request->input('circulation_end');
        $car->status = $request->input('status');

        // Guardar los cambios
        $car->save();

        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Actualizado..!!",
            'icon' => "success",
            'showConfirmButton'=> false,
            'timer'=> 1800
         ]);

        // Redirección a cars.index con un mensaje de éxito
        return redirect()->route('cars.index')->with('success', 'Vehículo actualizado con éxito');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car){
        $car->delete();

        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Eliminado, Proceso Inrebersible..!!",
            'icon' => "warning",
            'showConfirmButton'=> false,
            'timer'=> 2000
         ]);

        return redirect()->route('cars.index')->with('success', 'Registro Eliminado');
    }
}
