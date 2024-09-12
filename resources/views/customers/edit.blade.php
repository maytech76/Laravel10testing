<x-app-layout>

    <!-- Header General -->
    <div class="w-[590px] sm:w-[630px] md:w-[1230px] justify-center bg-white rounded-md shadow mb-8 mx-auto p-2 mt-8">
        <div class="flex flex-col sm:flex-row sm:items-center w-[170px] sm:w-[700px] md:w-[1200px] justify-between mx-auto my-2">
    
            <!-- Left: Title -->
            <div class="my-1 sm:mb-0 sm:mr-8">
                <h3 class="text-sm md:text-2xl text-gray-800 dark:text-gray-100 font-normal">Edición  Ficha del Cliente</h3>
            </div>
    
            <!-- Right: Actions -->
            <div class="sm:ml-6 sm:mx-0 grid grid-flow-col justify-center sm:justify-between md:justify-end gap-2">
                <x-datepicker />
            </div>
    
        </div>
    </div>
    
    
        <div class="bg-white p-8 rounded-lg shadow m-4">
          <form class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-3 gap-4" action="{{route('customers.update', $customer->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="vehicle_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria:</label>
                    <select name="customertype_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Selecionar</option>

                            @foreach ($customertype as $customert)    
                            <option value="{{$customert->id}}"
                                           {{ $customer->customertype_id  == $customert->id ? 'selected' : ''}} >
                                           {{$customert->name}} </option>
                            @endforeach
                    </select>
                </div>
                   

                 <!-- Primer input -->
                 <div class="mb-5">
                    <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RUN:</label>
                    <input value="{{$customer->rut}} " type="text" name="rut" id="input1" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Repite los divs como este para los 14 inputs -->
                <div class="mb-5">
                    <label for="input2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres:</label>
                    <input value="{{$customer->name}} " name="name" type="text" id="input2" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                
                 <!-- Primer input -->
                 <div class="mb-5 xs:col-span-3">
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección:</label>
                    <input value="{{$customer->address}}"  name="address" type="text" id="address" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                
                    <div class="xs:col-span-3 sm:flex justify-between items-center w-[800px] sm:gap-4 mb-4">
                           
                            <!-- Session Phone -->
                            <div class="mb-5">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">N° Celular</label>
                                <input value="{{$customer->phone}}" name="phone" type="text" id="phone" class="xs:w-[150px] w-[310px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>
            
                            {{-- Session Status --}}
                            <div x-data="{ status: {{ $customer->status }} }" class="mb-2">
                                <label for="status" class="xs:w-[30px] sm:w-[10px] md:w-[250px] block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Estado del Cliente:
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
                            
                            {{-- Session Image --}}
                            <div class="sm:mb-5 sm:-pl-100">
                                <div x-data="{ imagePreview: '{{ $customer->image_path ? asset('storage/' . $customer->image_path) : '' }}' }">          
                                    
                                    <div class="flex items-center gap-4 mt-7 sm:mx-5">
                                        {{-- Imagen Preview --}}
                                        <template x-if="imagePreview">
                                            <img :src="imagePreview" alt="Vista previa de la imagen" class="xs:w-[100px] xs:h-[85px] md:w-[100px] md:h-[80px] object-cover rounded-md shadow-md">
                                        </template>
                                        {{-- Input File --}}
                                        <div class="mb-5 ml-4">
                                            <label for="image" class="block text-sm font-medium text-gray-700 mt-4 sm:mt-0">Logo / Imagen </label>
                                            <input type="file" name="image" id="image" class="mt-1 block xs:w-[180px] sm:w-[350px]" accept="image/*" @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                                        </div>
                                    </div>           
                                </div>
                            </div>{{-- End Image --}}
                    </div>
                            
                    <!-- Botones -->
                    <div class="sm:col-span-2 lg:col-span-4 flex justify-center">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-2">Registrar</button>
                        <button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-400 dark:hover:bg-red-500 dark:focus:ring-red-600 mx-2">
                            <a href="{{route('customers.index')}}">Regresar</a>
                        </button>
                    </div>         
            </form>
        </div>

    </div>
    </div>
</x-app-layout>
