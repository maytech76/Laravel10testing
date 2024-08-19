<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-2 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-2">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Productos</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <x-datepicker />
            </div>

        </div>

      <div class="flex items-center justify-center px-4 sm:px-6 lg:px-8 py-2 w-full max-w-9xl mx-auto">
         {{-- Formulario de registro --}}
        <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">


            <div>
                <div class="mb-4 flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">N° del Registro: </span>
                    <p class="text-sm text-gray-700 dark:text-gray-400">{{$product->id}}</p>
                </div>
                <div class="mb-4 flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Nombre del Producto: </span>
                    <p class="text-sm text-gray-700 dark:text-gray-400">{{$product->name}}</p>
                </div>
                <div class="mb-4 flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Nombre de la Categoría: </span>
                    <p class="text-sm text-gray-700 dark:text-gray-400">{{$product->category->name}}</p>
                </div>
                <div class="mb-4 flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Existencia en Stock: </span>
                    <p class="text-sm text-gray-700 dark:text-gray-400">{{$product->stock}}</p>
                </div>
                <div class="mb-4 flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Precio Actual </span>
                    <p class="text-sm text-gray-700 dark:text-gray-400">{{$product->price}}</p>
                </div>
                <div class="mb-4 flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Fecha de Registro: </span>
                    <p class="text-sm text-gray-700 dark:text-gray-400">{{$product->created_at}}</p>
                </div>

                <hr>
                <h2 class="py-1 text-blue-400">Detalles del Usuario</h2>
                <hr>
            
                <div class="mt-4 mb-4 flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Usuario: </span>
                    <p class="text-sm text-gray-700 dark:text-gray-400">{{ $user->name }}</p>
                </div>
                <div class="mb-4 flex items-center gap-2">
                    <span class="text-sm font-bold text-gray-900 dark:text-white">Email del Usuario: </span>
                    <p class="text-sm text-gray-700 dark:text-gray-400">{{ $user->email }}</p>
                </div>
                
            
                <div class="w-full">
                    <a href="{{route('products.index')}}" class="block w-full text-center bg-green-200 hover:bg-green-700 text-green-900 hover:text-white cursor-pointer p-2 rounded-lg">
                        Cerrar
                    </a>
                </div>
            </div>
            
        </div>
     </div>

    </div>


</x-app-layout>
