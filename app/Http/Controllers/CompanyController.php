<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class CompanyController extends Controller
{
   
    public function index(){
        
        $companies = Company::with('city')->paginate(1);
        $companyCount = \App\Models\Company::count();

        return view('companies.index', compact('companies',  'companyCount'));
    }

   
    public function create(){
        $cities = City::all();

        $companyCount = \App\Models\Company::count();

        if ($companyCount > 0) {


            session()->flash('swal', [
            
                'title' => "No  se puede crear una nueva empresa",
                'text'=> "Ya existe  una empresa creada",
                'icon' => "error",
                'showConfirmButton'=> false,
                'timer'=> 2300
             ]);

            return redirect()->route('companies.index');
        }

        return view('companies.create',  compact('cities'));
    }

   
    public function store(Request $request){
        
        /* dd($request->toArray()); */

        $request->validate([


            'rut' =>'required',
            'name' =>'required',
            'city_id' =>'required',
            'address' =>'required',
            'web' =>'required',
            'phone' =>'required',
            'email' =>'required',
            'manager' =>'nullable',
            'image_path'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('companies', 'public');
            
        }

        $company = new Company();
        $company->rut = $request->input('rut');
        $company->name = $request->input('name');
        $company->city_id = $request->input('city_id');
        $company->address = $request->input('address');
        $company->web = $request->input('web');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->manager = $request->input('manager');
        $company->image_path = $imagePath; 
        $company->save();

        session()->flash('swal', [
            
            'title' => "Buen Trabajo",
            'text'=> "Registro Exitoso..!!",
            'icon' => "success",
            'showConfirmButton'=> false,
            'timer'=> 1700
         ]);

        //Redirecionamos a products.index
        return redirect()->route('companies.index');

    }

   
    public function show(Company  $company)
    {
        $cities = $company->city;

        return view('companies.show', compact('company', 'cities'));
    }

    
    public function edit(string $id)
    {
        $cities = City::all();
        $company = Company::find($id);

        return view('companies.edit', compact('company', 'cities'));
    }

   
    public function update(Request $request, string $id)
    {
        
    }

    
    public function destroy(string $id)
    {
        //
    }
}
