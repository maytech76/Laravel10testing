<x-app-layout>

    <!-- Header General -->
    <div class="w-[590px] sm:w-[630px] md:w-[1230px] justify-center bg-white rounded-md shadow mt-4 mx-auto p-2">
        <div class="flex flex-col sm:flex-row sm:items-center w-[170px] sm:w-[700px] md:w-[1200px] justify-between mx-auto my-2">
    
            <!-- Left: Title -->
            <div class="my-1 sm:mb-0 sm:mr-8">
                <h3 class="text-sm md:text-2xl text-gray-800 dark:text-gray-100 font-normal">Edición  Ficha de Conductor</h3>
            </div>
    
            <!-- Right: Actions -->
            <div class="sm:ml-6 sm:mx-0 grid grid-flow-col justify-center sm:justify-between md:justify-end gap-2">
                <x-datepicker />
            </div>
    
        </div>
    </div>
    
    
        <div class="bg-white p-8 rounded-lg shadow m-4">
          <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" action="{{route('drivers.update', $driver->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="vehicle_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                        Licencia :</label>
                    <select name="license_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Selecionar</option>

                            @foreach ($licenses as $license)    
                            <option value="{{$license->id}}"
                                           {{ $driver->license_id  == $license->id ? 'selected' : ''}} >
                                           {{$license->name}} </option>
                            @endforeach
                    </select>
                </div>
                
                <!-- Repite los divs como este para los 14 inputs -->
                <div class="mb-4">
                    <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asignar Usuario:</label>
                    <select name="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Seleccionar</option>
                        @foreach ($users as $user)    
                            <option value="{{ $user->id }}"
                                {{ $driver->user_id == $user->id ? 'selected' : ''}}>
                                {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                 <!-- Primer input -->
                 <div class="mb-5">
                    <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RUN:</label>
                    <input value="{{$driver->run}} " type="text" name="run" id="input1" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Repite los divs como este para los 14 inputs -->
                <div class="mb-5">
                    <label for="input2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres:</label>
                    <input value="{{$driver->name}} " name="name" type="text" id="input2" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                 <!-- Primer input -->
                 <div class="mb-5">
                    <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos:</label>
                    <input value="{{$driver->last_name}} " name="last_name" type="text" id="input1" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Repite los divs como este para los 14 inputs -->
                <div class="mb-5">
                    <label for="birth" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cumpleaño</label>
                    <input value="{{\Carbon\Carbon::parse($driver->birth)->format('Y-m-d')}}" name="birth" type="date" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                 <!-- Primer input -->
                 <div class="mb-5">
                    <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección:</label>
                    <input value="{{$driver->address}}"  name="address" type="text" id="input1" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Repite los divs como este para los 14 inputs -->
                <div class="mb-5">
                    <label for="input2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">N° Celular</label>
                    <input value="{{$driver->phone}}"  name="phone" type="text" id="input2" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                 <!-- Primer input -->
                 <div class="mb-5">
                    <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                    <input value="{{$driver->email}}" name="email" type="text" id="input1" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Repite los divs como este para los 14 inputs -->
                <div class="mb-5">
                    <label for="input2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contacto:</label>
                    <input value="{{$driver->contact}}" name="contact" type="text" id="input2" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                 <!-- Primer input -->
                 <div class="mb-5">
                    <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Celular Contacto:</label>
                    <input value="{{$driver->contact_phone}}" name="contact_phone" type="text" id="input1" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Repite los divs como este para los 14 inputs -->
                <div class="mb-5">
                    <label for="input2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Vencimiento de Licencia:</label>
                    <input value="{{\Carbon\Carbon::parse($driver->license_end)->format('Y-m-d')}}" name="license_end" type="date" id="input2" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                {{-- SESSION DATOS SALUD --}}
                <div class="sm:flex gap-5">
                   
                    <div class="sx:col-span-1 sm:col-span-2 mb-5">
                        <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Sangre:</label>
                        <input value="{{$driver->blood_type}}" name="blood_type" type="text" id="input1" class="block w-[485px] sm:w-[280px] lg:w-[375px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>

                  
                    <div class="col-span-1 sm:col-span-2 xs:mb-6">
                        <label for="input2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Patologia</label>
                        <input value="{{$driver->pathology}}" name="pathology" type="text" id="input2" class=" block w-[485px] sm:w-[280px] lg:w-[375px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>

                    
                    <div x-data="{ status: {{ $driver->status }} }" class="col-span-1 sm:col-span-2 mb-2">
                        <label for="status" class="md:w-[150px] block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Estado del Conductor:
                        </label>
                    
                        <label class="inline-flex items-center cursor-pointer mt-2">
                            <!-- Input oculto para enviar el valor 0 cuando el checkbox no está marcado -->
                            <input type="hidden" name="status" value="0">
                            
                            <!-- Checkbox -->
                            <input name="status" type="checkbox" :checked="status == 1" :value="status" @click="status = status == 1 ? 0 : 1" class="sr-only peer">
                            
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                            </div>
                            
                            <span class="ms-3 text-sm font-medium" :class="status == 1 ? 'text-green-600' : 'text-gray-700'">
                                Activo
                            </span>
                        </label>
                    </div>
                    
                    
                </div>

                 {{-- Session TEXAREA-IMAGEN --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 xs:mb-[50px]">

                    <div class="sm:flex gap-5 xs:mt-[10px] sm:mt-[100px]">
                          
                        {{-- Session Textarea --}}
                        <div class="sm:-ml-[420px] md:-ml-[290px] mb-5 sm:mb-0">
                            <label for="textarea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Datos Bancarios:</label>
                            <textarea name="bank_details" id="textarea" rows="4" class="w-[490px] sm:w-[350px] md:w-[480px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$driver->bank_details}}</textarea>
                        </div>

                        {{-- Session Image --}}
                        <div class=" sm:ml-[50px] md:ml-[10px] xs:mb-2 sm:mb-5">
                            <div x-data="{ imagePreview: '{{ $driver->image_path ? asset('storage/' . $driver->image_path) : '' }}' }">          
                                <!-- Vista previa de la imagen -->
                                <div class="flex items-center gap-4 mt-7 mx-5">
                                    <template x-if="imagePreview">
                                        <img :src="imagePreview" alt="Vista previa de la imagen" class="xs:w-[100px] xs:h-[85px] md:w-[150px] md:h-[120px] object-cover rounded-md shadow-md">
                                    </template>
                                    <div class="mb-5 ml-4">
                                        <label for="image" class="block text-sm font-medium text-gray-700 mt-4 sm:mt-0">Foto del Conductor</label>
                                        <input type="file" name="image" id="image" class="mt-1 block xs:w-[300px]" accept="image/*" @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                                    </div>
                                </div>           
                            </div>
                        </div>{{-- End Image --}}
                        
                    </div>
                </div>


                <!-- Botones -->
                <div class="sm:col-span-2 lg:col-span-4 flex justify-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-2">Registrar</button>
                    <button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-400 dark:hover:bg-red-500 dark:focus:ring-red-600 mx-2">
                        <a href="{{route('drivers.index')}}">Regresar</a>
                     </button>
                </div>
                
            </form>
        </div>
    </div>
</x-app-layout>
