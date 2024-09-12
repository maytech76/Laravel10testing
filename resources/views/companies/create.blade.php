<x-app-layout>

    <!-- Header General -->
    <div class="w-[590px] sm:w-[630px] md:w-[1230px] justify-center bg-white rounded-md shadow mt-4 mx-auto p-2">
        <div class="flex flex-col sm:flex-row sm:items-center w-[170px] sm:w-[700px] md:w-[1200px] justify-between mx-auto my-2">
    
            <!-- Left: Title -->
            <div class="my-1 sm:mb-0 sm:mr-8">
                <h3 class="text-sm md:text-2xl text-gray-800 dark:text-gray-100 font-normal">Registrar datos de la Empresa</h3>
            </div>
    
            <!-- Right: Actions -->
            <div class="sm:ml-6 sm:mx-0 grid grid-flow-col justify-center sm:justify-between md:justify-end gap-2">
                <x-datepicker />
            </div>
    
        </div>
    </div>
    
    
        <div class="bg-white p-8 rounded-lg shadow m-4">
          <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                @csrf


                 <!-- Rut del Cliente -->
                 <div class="mb-5">
                    <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rut:</label>
                    <input type="text" name="rut" id="input1" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Nombre del Cliente -->
                <div class="mb-5">
                    <label for="input2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                    <input name="name" type="text" id="input2" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                 {{-- Ciudad --}}
                <div class="mb-4">
                    <label for="vehicle_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ciudad :</label>
                    <select name="city_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Selecionar</option>
                            @foreach ($cities as $city)    
                            <option value="{{$city->id}}">{{$city->name}} </option>
                            @endforeach
                    </select>
                </div>

 
                 <!-- Pagina Web -->
                 <div class="mb-5">
                    <label for="web" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pagina Web:</label>
                    <input name="web" type="text" id="web" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Numero de Telefono -->
                <div class="mb-5">
                    <label for="input2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">N° de Telefono</label>
                    <input name="phone" type="text" id="input2" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                 <!-- Email -->
                 <div class="mb-5">
                    <label for="input1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                    <input name="email" type="text" id="input1" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                
                <!-- Director / gerente -->
                <div class="mb-5">
                    <label for="manager" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Director/Gerente:</label>
                    <input name="manager" type="text" id="manager" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>

                <!-- Logo de la Empresa -->
                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo de la Empresa</label>
                    <input name="image" type="file" id="file" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                </div>


                <!-- Direccion detallada-->
                <div class="mb-5 sm:col-span-2 lg:col-span-4">
                    <label for="textarea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Direccion Fiscal:</label>
                    <textarea name="address" id="address" rows="2" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>

                

                <!-- Botones -->
                <div class="sm:col-span-2 lg:col-span-4 flex justify-center">
                    <button type="button" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-400 dark:hover:bg-red-500 dark:focus:ring-red-600 mx-2">
                    <a href="{{route('companies.index')}}">Regresar</a>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-2">Registrar</button>
                     </button>
                </div> 
                          
            </form>
        </div>
    </div>
</x-app-layout>
