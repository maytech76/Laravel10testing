<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-4">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h3 class="text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">Ficha de Conductor</h3>
            </div>
            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <x-datepicker />
            </div>
        </div>

        <div class="flex items-center justify-center px-4 sm:px-6 lg:px-8 py-2 w-full max-w-9xl mx-auto">
            <div class="w-full max-w-6xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
               
                <div class="w-full text-center mb-8 text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">
                  <h3 class="mb-4">Datos  del Conductor</h3>
                  <hr>
                </div>
               
                <div class="sx:flex-wrap sm:flex gap-6">
                   {{--  grid grid-cols-1 md:grid-cols-4 gap-4 --}}

    
                    <div class="mx-auto w-[300px] bg-cover bg-center rounded-full shadow-md py-4 px-2 mb-4" style="aspect-ratio: 9/9;">
                        <img class="justify-center items-center w-[400px] sm:w-[150px] h-[260px] sm:h-[150px] object-cover rounded-full shadow-sm" src="{{ asset('storage/' . $driver->image_path)}}" />
                    </div>
                    
                    <div class="ml-4 grid grid-cols-1 md:grid-cols-4 mb-8">

                        <div class="mb-4 flex-wrap gap-2 pr-4">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">N° del Registro: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->id}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-4">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Tipo de Licencia: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->license->name}}</p>       
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">RUN: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->run}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Nombre:: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->name}} {{$driver->last_name}}</p>
                        </div>

                        <div class="mb-4 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Cumpleaño:</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->birth}}</p>
                        </div>
                        
                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Dirección:</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->address}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Celular:</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->phone}}</p>
                        </div>
                       
                        <div class="mb-2 flex-wrap gap-2">
                            <span class="text-sm font-bold text-gray-900 dark:text-white">Email:</span>
                            <p class="text-[15px] text-gray-500 dark:text-gray-400">{{$driver->email}}</p>
                        </div>

                        <div class="mb-4 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Persona Contacto:</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->contact}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Fech Expiración Lcc:</span>               
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($driver->license_end)->format('d-m-Y') }}</p>
                        </div>
                    
                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Tipo de Sangre: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->blood_type}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Patologia: </span>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{$driver->pathology}}</p>
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Kilimetraje Actual: </span>
                           {{--  <p class="text-sm text-gray-500 dark:text-gray-400">{{$car->klm_to_day}}</p> --}}
                        </div>


                        <div class="mb-2 flex-wrap gap-2">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Perm-Circulación: </span>
                           {{--  <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($car->circulation_end)->format('d-m-Y') }}</p> --}}
                        </div>

                        <div class="mb-2 flex-wrap gap-2 pr-6">
                            <span class="text-[15px] font-bold text-gray-900 dark:text-white">Estado del Conductor: </span>
                                       <p class="text-sm 
                                            @if($driver->status == 1) 
                                                bg-green-100 text-green-900  w-[80px] rounded-md text-center py-1
                                            @else
                                                bg-red-100 text-red-900 w-[80px] rounded-md text-center py-1
                                            @endif
                                            dark:text-gray-400">
                                            {{ $driver->status == 1 ? 'Activo' : 'Inactivo' }}
                                        </p>
                        </div>
    
                    </div>
    
                </div>
                    
                
                    <div class="w-full">
                        <a href="{{route('drivers.index')}}" class="block w-full text-center bg-blue-200 hover:bg-blue-700 text-green-900 hover:text-white cursor-pointer p-2 rounded-lg">
                            Cerrar
                        </a>
                    </div>
                
                
            </div>
          </div>


    </div>

</x-app-layout>