<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-4">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h3 class="text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">Ficha Técnica Vehiculo</h3>
            </div>
            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <x-datepicker />
            </div>
        </div>

        <div class="flex items-center justify-center px-4 sm:px-6 lg:px-8 py-2 w-full max-w-9xl mx-auto">
            <div class="w-full max-w-6xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
               
                <div class="w-full text-center mb-8 text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">
                  <h3 class="mb-4">Datos  del Vehiculo</h3>
                  <hr>
                </div>
               
                <div class="sx:flex-wrap sm:flex gap-6">
                   {{--  grid grid-cols-1 md:grid-cols-4 gap-4 --}}

    
                    <div class="w-[300px] bg-cover bg-center rounded-md shadow-sm py-4 px-2 mb-4" style="aspect-ratio: 12/9;">
                        <img class="justify-center items-center w-[400px] h-full object-cover rounded-md shadow-sm" src="{{ asset('storage/' . $car->image_path)}}" />
                    </div>
                    
                    <div class="ml-4 grid grid-cols-1 md:grid-cols-4 mb-8">

                        <div class="mb-4 flex-wrap gap-2 pr-4">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">N° del Registro: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->id}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-4">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Tipo de Vehiculo: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->cartype->name}}</p>       
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Marca del vehiculo: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->brand->name}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Modelo del Vehiculo: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->model_car->name}}</p>
                        </div>

                        <div class="mb-4 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Año de Fabricación</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->year}}</p>
                        </div>
                        
                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Color de Carroceria </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->color}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Cant- Pasajeros</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->position}}</p>
                        </div>
                       
                        <div class="mb-2 flex-wrap gap-2">
                            <span class="text-sm font-bold text-gray-900 dark:text-white">Placa Patente:</span>
                            <p class="text-[15px] text-gray-500 dark:text-gray-400">{{$car->patent}}</p>
                        </div>

                        <div class="mb-4 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Fecha de Fabricación: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->year}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Tipo de Combustible:</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->fuel_type}}</p>
                        </div>
                    
                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">F-Mantenimiento: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">12-05-2024</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Tipo de Tracción </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->traction}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Kilimetraje Actual: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->klm_to_day}}</p>
                        </div>


                        <div class="mb-2 flex-wrap gap-2">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Perm-Circulación: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($car->circulation_end)->format('d-m-Y') }}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Estado del Vehiculo: </span>
                                       <p class="text-sm 
                                            @if($car->status == 1) 
                                                bg-green-100 text-green-900  w-[80px] rounded-md text-center py-1
                                            @else
                                                bg-red-100 text-red-900 w-[80px] rounded-md text-center py-1
                                            @endif
                                            dark:text-gray-400">
                                            {{ $car->status == 1 ? 'Activo' : 'Inactivo' }}
                                        </p>
                        </div>
    
                    </div>
    
                </div>
                    
                
                    <div class="w-full">
                        <a href="{{route('cars.index')}}" class="block w-full text-center bg-blue-200 hover:bg-blue-700 text-green-900 hover:text-white cursor-pointer p-2 rounded-lg">
                            Cerrar
                        </a>
                    </div>
                
                
            </div>
          </div>


    </div>

</x-app-layout>