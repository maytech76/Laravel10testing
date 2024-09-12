<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Customertype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
   
    public function index(){
        $customers= Customer::with('customerType')->paginate(5);

        return view('customers.index', compact('customers'));
    }

  
    public function create(){
        $customertype =  Customertype::all();
        return view('customers.create', compact('customertype'));
    }

   
    public function store(Request $request){
        /* dd($request->toArray()); */

        $request->validate([

            'customertype_id',
            'rut',
            'name',
            'address',
            'phone',
            'image_path',
            'status'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('customers', 'public');
            
        }

        $customer = new Customer();
        $customer->customertype_id = $request->input('customertype_id');
        $customer->rut = $request->input('rut');
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->image_path = $imagePath;
        $customer->save();

        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Exitoso..!!",
            'icon' => "success",
            'showConfirmButton'=> false,
            'timer'=> 1700
         ]);


        //Redirecionamos a products.index
        return redirect()->route('customers.index');


    }

    
    public function show(Customer $customer){
        $customertype = $customer->customerType;
        return view('customers.show', compact('customer', 'customertype'));
    }

    
    public function edit(Customer $customer){

        $customertype = Customertype::all();
        return view('customers.edit', compact('customer', 'customertype'));
    }

   
    public function update(Request $request, Customer $customer){

        $request->validate([

            'customertype_id',
            'rut',
            'name',
            'address',
            'phone',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'
        ]);

         // Manejo de la imagen
       if ($request->hasFile('image')) {

        // Si hay una nueva imagen, la guardamos y eliminamos la imagen anterior si existe
        if ($customer->image_path) {
            Storage::disk('public')->delete($customer->image_path);
        }

        // Guardar la nueva imagen
        $imagePath = $request->file('image')->store('drivers', 'public');
        $customer->image_path = $imagePath;

       }

       $customer->customertype_id = $request->input('customertype_id');
       $customer->rut = $request->input('rut');
       $customer->name = $request->input('name');
       $customer->address = $request->input('address');
       $customer->phone = $request->input('phone');
       $customer->save();

       session()->flash('swal', [
           
           'title' => "Buen Trabajo",
           'text'=> "Actualización Exitosa..!!",
           'icon' => "success",
           'showConfirmButton'=> false,
           'timer'=> 1800
        ]);


       //Redirecionamos a customers.index
       return redirect()->route('customers.index');




    }

   
    public function destroy(string $id)
    {
        //
    }
}
