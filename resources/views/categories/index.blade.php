<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h3 class="text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">Modulo de Categorias</h3>
            </div>
            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                <x-datepicker />
                <!-- Add view button -->
                <a class="btn btn-verde bg-green-800 hover:bg-green-400 hover:text-green-900" href="{{ route('categories.create') }}">
                    <p class="text-white"> + Nuevo</p>
                </a>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Listado de Categorias
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Visualización de las diferentes Categorias de productos y servicios ACTIVAS de nuestro sistema</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                           #Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ver
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Editar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Eliminar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{$category->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$category->name}}
                        </td>
                        <td class="px-6 py-4">
                            <button><a href="{{ route('categories.show', $category->id) }}" class="text-blue-600">Ver</a></button>
                        </td>
                        <td class="px-6 py-4">
                            <button><a href="{{ route('categories.edit', $category->id) }}" class="text-yellow-600">Editar</a></button>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Eliminar</button>
                            </form>
                        </td>               
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Paginación -->
            <div class="p-4">
                {{ $categories->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
