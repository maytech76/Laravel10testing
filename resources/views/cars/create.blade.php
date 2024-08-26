
<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">


        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-4">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h3 class="text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">Registro de Vehiculo</h3>
            </div>
            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <x-datepicker />
            </div>
        </div>



        <div class="bg-white w-full p-6 rounded-lg shadow mb-8">
            <form action="{{route('cars.store')}}" method="POST" class="max-w-xxl mx-auto grid grid-cols-1 md:grid-cols-3 gap-4" enctype="multipart/form-data">

                @csrf

                <div class="mb-4">
                    <label for="vehicle_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                        vehículo :</label>
                    <select name="cartype_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Seleciona una Opción</option>
                            @foreach ($cartypes as $cartype)    
                            <option value="{{$cartype->id}}">{{$cartype->name}} </option>
                            @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="vehicle_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Marca
                        :</label>
                    <select name="brand_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Seleciona una Opción</option>
                        @foreach ($brands as $brand)    
                        <option value="{{$brand->id}}">{{$brand->name}} </option>
                        @endforeach
                    </select>
                </div>

                 {{-- Select Modelo_Car --}}
                <div class="mb-4">
                    <label for="vehicle_type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modelo :</label>
                    <select name="model_car_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Seleciona una Opción</option>
                        @foreach ($modelcars as $modelcar)    
                        <option value="{{$modelcar->id}}">{{$modelcar->name}} </option>
                        @endforeach
                    </select>
                </div>

                {{-- Año del vehiculo --}}
                <div class="mb-4">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año de
                        Fabricación :</label>

                    <select name="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Selecione una opción</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>

                {{-- Tipo de Traccion --}}
                <div class="mb-4">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                        Tracción :</label>

                    <select name="traction"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Selecione una opción</option>
                        <option value="4x2">4 x 2 (Trasera)</option>
                        <option value="2x2">4 x 4 (Trasera)</option>

                    </select>
                </div>

                {{--  Numero de Pasajeros --}}
                <div class="mb-5">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">N° de
                        Puestos</label>
                    <input type="number" name="position"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                {{-- Color del vehiculo --}}
                <div class="mb-5">
                    <label for="color"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                    <input type="text" name="color"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>

                {{-- Placa-Patente --}}
                <div class="mb-4">
                    <label for="plate"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Placa-Patente</label>
                    <input type="text" name="patent"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required placeholder="Ejemplo: XX-XX-XX" />
                </div>


                {{-- Tipo de Combustible --}}
                <div class="mb-4">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de
                        Combustible :</label>

                    <select name="fuel_type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Selecione una opción</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Diesel">Diesel</option>

                    </select>
                </div>


                {{-- Kilimetraje Actual --}}
                <div class="mb-4">
                    <label for="klm_to_day"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kilometraje Actual</label>
                    <input type="number" name="klm_to_day"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>


                {{-- Foto del Vehiculo --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Foto
                        del Vehiculo</label>
                    <input type="file" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <div class="mt-1 text-sm text-gray-500 dark:text-gray-300">Seleccionar la foto de perfil para la
                        ficha principal del Vehiculo</div>
                </div>


                {{-- Fecha de Ven Permiso de Circulacion --}}
                <div class="mb-5">
                    <label for="circulation_end"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de Fin de
                        Circulación</label>
                    <input type="date" name="circulation_end"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required />
                </div>


                <div class="col-span-1 md:col-span-3 flex justify-end gap-4 mt-2 mb-4">
                    <button type="reset"
                        class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-700 dark:hover:bg-gray-800 dark:focus:ring-gray-600">
                        Resetear
                    </button>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
