<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Producto</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <x-datepicker />

                <!-- Add view button -->
                <button
                    class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Nuevo</span>
                </button>

            </div>

        </div>



       <div class="flex justify-center">
        
        <div class="w-full max-w-1xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

            <form action="{{route('products.update', $product->id)}} " method="POST" class="grid grid-cols-2 gap-4" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="w-full bg-cover rounded-md shadow-sm " style="aspect-ratio: 12/9;">

                    <div x-data="{ imagePreview: '{{ $product->image_path ? asset('storage/' . $product->image_path) : '' }}' }">
                        <!-- Vista previa de la imagen -->
                        <div class="mt-2">
                            <template x-if="imagePreview">
                                <img :src="imagePreview" alt="Vista previa de la imagen" class="justify-center items-center w-full h-full object-cover rounded-md shadow-sm">
                            </template>
                        </div>

                        <label for="image" class="block text-sm font-medium text-gray-700">Imagen del Producto</label>
                        <input type="file" name="image" id="image" class="mt-1 block w-100" accept="image/*"
                            @change="imagePreview = URL.createObjectURL($event.target.files[0])">
                    </div>
                </div>


            <div class="grid grid-cols-1 gap-2">
                    <div class="mb-2">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                        <input type="name" name="name" value="{{$product->name}} "
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Ingresar Nombre del Producto" required />
                    </div>
                
                    <div class="mb-2">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                        <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            
                            <option value="disable">Selecione Categoria</option>
                            @foreach ($categories as $item)

                            {{-- comparamos el valor de item->id se igual al valor category_id del product de no serlo muestra una cadena vacia --}}
                            <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>
                                {{$item->name}}</option>
                        
                            @endforeach
                        
                        </select>
                    </div>

                    <div class="mb-2 col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                        <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa la Descrión detallada del Producto">{{old('description', $product->description)}}</textarea>  
                    </div>

                    <div class="mb-5">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                        <input type="text" id="price" name="price" value="{{$product->price}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>

                    <div class="mb-5">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                        <input type="number" id="stock" name="stock" value="{{$product->stock}}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
            </div>



                  {{-- Botones --}}
               <div class="w-full items-center gap-6">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Editar
                    </button>

                    <a href="{{route('products.index')}} ">
                        <button 
                        class="text-gray-800 bg-yellow-200 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Regresar</button>
                    </a>

                </div>
            </form>
        </div> 

       </div> 

    </div>
</x-app-layout>