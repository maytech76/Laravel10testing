<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-4">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Productos</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <x-datepicker />


            </div>

        </div>



       <div class="flex justify-center"> 
        <div class="w-600 max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

            <form action="{{route('products.store')}}" method="POST" class="grid grid-cols-1 gap-4" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ingresar Nombre del Producto" required />
                </div>

                <div class="mb-2">
                    <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                    <select name="category_id" id="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <option value="disable">Selecione Categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}} ">{{$category->name}}</option>
                        @endforeach
                       
                      </select>
                </div>

                
                    <div class="mb-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                        <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ingresa la Descrión detallada del Producto"></textarea>  
                    </div>

    
                    <div class="mb-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                        <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    </div>
                

              
                <div class="mb-2 flex gap-2">

                    <div class="w-1/2">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                        <input type="text" id="price" name="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                
                    <div class="w-1/2">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                        <input type="number" id="stock" name="stock"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required />
                    </div>
                </div>
                


                
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Registrar
                </button>
            </form>
        </div> 

       </div> 

    </div>
</x-app-layout>