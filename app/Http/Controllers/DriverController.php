<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\License;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class DriverController extends Controller
{
   
    public function index(){
        $drivers = Driver::with('user', 'license')->paginate(6);

        return view('drivers.index', compact('drivers'));
    }

  
    public function create(){
        $licenses =License::all();
        $users = User::all();

        return view('drivers.create', compact('licenses', 'users'));
    }


    public function store(Request $request) {

        /* dd($request->toArray()); */

        $request->validate([

            'license_id'=> 'required',
            'user_id' => 'required',
            'run'=> 'required',
            'name' => 'required',
            'last_name'=> 'required',
            'birth'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'contact'=> 'nullable',
            'contact_phone'=>'nullable',
            'bank_details'=> 'nullable',
            'license_end'=> 'required',
            'blood_type'=> 'required',
            'pathology'=> 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('drivers', 'public');
            
        }

        $driver = new Driver();
        $driver->license_id = $request->input('license_id');
        $driver->user_id = $request->input('user_id');
        $driver->run = $request->input('run');
        $driver->name = $request->input('name');
        $driver->last_name = $request->input('last_name');
        $driver->birth = $request->input('birth');
        $driver->address = $request->input('address');
        $driver->phone = $request->input('phone');
        $driver->email = $request->input('email');
        $driver->contact = $request->input('contact');
        $driver->contact_phone = $request->input('contact_phone');
        $driver->bank_details = $request->input('bank_details');
        $driver->license_end = $request->input('license_end');
        $driver->blood_type = $request->input('blood_type');
        $driver->pathology = $request->input('pathology');
        $driver->image_path = $imagePath; 
        $driver->save();

        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Exitoso..!!",
            'icon' => "success",
            'showConfirmButton'=> false,
            'timer'=> 1700
         ]);

        //Redirecionamos a products.index
        return redirect()->route('drivers.index');

    }

   
    public function show(Driver $driver){
        
        $license= $driver->license;
        return view('drivers.show', compact('driver', 'license'));
       
    }

   
    public function edit(Driver $driver){
        $licenses = License::all();
        $users = User::all();

        return view('drivers.edit', compact('driver', 'licenses', 'users'));
    }

   
    public function update(Request $request, Driver $driver){
        $request->validate([

            'license_id'=> 'required',
            'user_id' => 'required',
            'run'=> 'required',
            'name' => 'required',
            'last_name'=> 'required',
            'birth'=> 'required',
            'address'=> 'required',
            'phone'=> 'required',
            'email'=> 'required',
            'contact'=> 'nullable',
            'contact_phone'=>'nullable',
            'bank_details'=> 'nullable',
            'license_end'=> 'required',
            'blood_type'=> 'required',
            'pathology'=> 'required',
            'status'=> 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

         // Manejo de la imagen
       if ($request->hasFile('image')) {

        // Si hay una nueva imagen, la guardamos y eliminamos la imagen anterior si existe
        if ($driver->image_path) {
            Storage::disk('public')->delete($driver->image_path);
        }

        // Guardar la nueva imagen
        $imagePath = $request->file('image')->store('drivers', 'public');
        $driver->image_path = $imagePath;

       }

       $driver->license_id = $request->input('license_id');
       $driver->user_id = $request->input('user_id');
       $driver->run = $request->input('run');
       $driver->name = $request->input('name');
       $driver->last_name = $request->input('last_name');
       $driver->birth = $request->input('birth');
       $driver->address = $request->input('address');
       $driver->phone = $request->input('phone');
       $driver->email = $request->input('email');
       $driver->contact = $request->input('contact');
       $driver->contact_phone = $request->input('contact_phone');
       $driver->bank_details = $request->input('bank_details');
       $driver->license_end = $request->input('license_end');
       $driver->blood_type = $request->input('blood_type');
       $driver->pathology = $request->input('pathology');
       $driver->status = $request->input('status');

    /*    dd($driver->toArray()); */
      
       $driver->save();

       session()->flash('swal', [
           
           'title' => "Buen Trabajo",
           'text'=> "Actualización Exitosa..!!",
           'icon' => "success",
           'showConfirmButton'=> false,
           'timer'=> 1700
        ]);

       //Redirecionamos a drivers.index
       return redirect()->route('drivers.index');


    }

    
    public function destroy(Driver $driver){
        $driver->delete();

        session()->flash('swal', [
            
            'title' => "Registro",
            'text'=> "Eliminado, Proceso Inrebersible..!!",
            'icon' => "warning",
            'showConfirmButton'=> false,
            'timer'=> 2000
         ]);

        //Redirecionamos a categories.index
        return redirect()->route('drivers.index')->with('success', 'Conductor  Eliminada');
    }
}
