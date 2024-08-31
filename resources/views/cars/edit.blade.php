<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-4 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-4 px-2 lg:px-4 w-full max-w-9xl mx-auto">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h3 class="text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">Ficha Técnica Vehiculo</h3>
            </div>
            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <x-datepicker />
            </div>
        </div>

        <div class="flex items-center justify-center px-2 sm:px-4 lg:px-4 py-2 w-full max-w-9xl mx-auto">

                <div
                    class="w-full max-w-6xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

                    {{-- TITLE OF FORM --}}
                    <div class="w-full text-center mb-8 text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">
                        <h3 class="mb-4">Datos del Vehiculo</h3>
                        <hr>
                    </div>

                    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                          @method('PUT')

                    <div class="sx:flex-wrap sm:flex gap-6">

                        {{-- Image-cars# --}}
                        <div x-data="{ imagePreview: '{{ $car->image_path ? asset('storage/' . $car->image_path) : '' }}' }" >

                                <!-- Vista previa de la imagen -->
                                <div class="mt-2">
                                    <template x-if="imagePreview">
                                        <img :src="imagePreview" alt="Vista previa de la imagen" class="justify-center items-center w-[300px] h-[250px] object-cover rounded-md shadow-sm">
                                    </template>
                                </div>

                                <label for="image" class="block text-sm font-medium text-gray-700">Imagen del Vehiculo</label>
                                <input type="file" name="image" id="image" class="mt-1 block w-100" accept="image/*"
                            @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                    
                        </div>

                        <div class="ml-2 grid grid-cols-1 md:grid-cols-4 mb-8">
 

                            {{-- Select CarTypes# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-4">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Tipo de Vehiculo:
                                </span>
                                <select name="cartype_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[180px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Selecionar..</option>

                                    @foreach ($cartypes as $type)
                                        <option value="{{ $type->id }}"
                                            {{ $car->cartype_id == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }} </option>
                                    @endforeach

                                </select>
                            </div>


                            {{-- Select Brands# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Marca del vehiculo:
                                </span>
                                <select name="brand_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Selecionar..</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $car->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Select Model_car# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Modelo del Vehiculo:
                                </span>
                                <select name="model_car_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Selecionar..</option>

                                    @foreach ($modelcars as $modelo)
                                        <option value="{{ $modelo->id }}"
                                            {{ $car->model_car_id == $modelo->id ? 'selected' : '' }}>
                                            {{ $modelo->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                           

                            {{-- Color  del vehiculo# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Color de Carroceria
                                </span>
                                <input name="color"
                                    class="w-[180px] rounded-md border-gray-300 text-sm text-gray-500 dark:text-gray-400"
                                    value="{{ $car->color }}">
                            </div>

                            {{-- Number to Passengers# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Cant- Pasajeros</span>
                                <input type="number" name="position" value="{{ $car->position }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>

                            {{-- Number to Patent# --}}
                            <div class="mb-2 flex-wrap gap-2">
                                <span class="text-sm font-bold text-gray-900 dark:text-white">Placa Patente:</span>
                                <input type="text" value="{{ $car->patent }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[185px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required readonly>
                            </div>


                            {{-- Year to factory# --}}
                            <div class="mb-4 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Fecha de Fabricación:
                                </span>
                                <select name="year"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Selecionar..</option>
                                    <option value=2022>2022</option>
                                    <option value=2023>2023</option>
                                    <option value=2024>2024</option>
                                    <option value=2025>2025</option>
                                    <option value=2026>2026</option>
                                </select>
                            </div>


                            {{-- Fuel Type# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Tipo de
                                    Combustible:</span>
                                <select name="fuel_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[180px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Selecionar..</option>
                                    <option value="Gasolina">Gasolina</option>
                                    <option value="Diesel">Diesel</option>

                                </select>
                            </div>


                            {{-- Date to Maintenace# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">F-Mantenimiento:
                                </span>
                                <input type="date" name="maintenance" value="{{ $car->maintenance }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required placeholder="Ejemplo: XX-XX-XX" />
                            </div>

                            {{-- Type Traction road# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Tipo de Tracción
                                </span>
                                <select name="traction"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Selecionar..</option>
                                    <option value="4x2">4 x 2 (Trasera)</option>
                                    <option value="4x2">4 x 2 (Delantera)</option>
                                    <option value="4x4">4 x 4 (Trasera)</option>
                                    <option value="4x2">4 x 2 (Delantera)</option>

                                </select>
                            </div>


                            {{-- Kilometred Toda# --}}
                            <div class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Kilimetraje Actual:
                                </span>
                                <input type="number" name="klm_to_day" value="{{ $car->klm_to_day }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>


                            {{-- Circulations-End# --}}
                            <div class="mb-2 flex-wrap gap-2">
                                <span class="text-[15px] font-bold text-gray-900 dark:text-white">Perm-Circulación:
                                </span>
                                {{--  <p class="text-sm text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::parse($car->circulation_end)->format('d-m-Y') }}</p> --}}
                                <input type="date" name="circulation_end" value="{{ $car->circulation_end }}"
                                    class="w-[185px] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required />
                            </div>


                            {{-- Status to Car# --}}
                            <div x-data="{ status: {{ $car->status }} }" class="mb-2 flex-wrap gap-2 pr-6">
                                <span class="text-[15px] font-bold mb-8">
                                    Estado del Vehiculo:
                                </span>
                                <label class="inline-flex items-center cursor-pointer mt-2">
                                    <input type="hidden" name="status" value="0">

                                    <input name="status" type="checkbox" :checked="status == 1" value="{{$car->status}}" @click="status = status == 1 ? 0 : 1" class="sr-only peer">
                                    <div
                                        class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                    </div>
                                    <span class="ms-3 text-sm font-medium"
                                        :class="status == 1 ? 'text-green-600' : 'text-gray-600'">
                                        Activo
                                    </span>
                                </label>
                            </div>


                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="w-full flex gap-6 text-center justify-center">
                        <a href="{{ route('cars.index') }}"
                            class="block w-[200px] text-center bg-blue-200 hover:bg-blue-700 text-green-900 hover:text-white cursor-pointer p-2 rounded-lg">
                            Cerrar
                        </a>

                        <button type="submit"
                            class="block w-[200px] text-center bg-yellow-200 hover:bg-yellow-700 text-yellow-900 hover:text-black cursor-pointer p-2 rounded-lg">
                            Editar
                        </button>
                    </div>


                </div>

            </form>

        </div>

    </div>

</x-app-layout>
