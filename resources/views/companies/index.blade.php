<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div x-data="{ companyExists: {{ $companyCount > 0 ? 'true' : 'false' }} }" class="sm:flex sm:justify-between sm:items-center mb-8">
                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h3 class="text-xl md:text-xl text-gray-700 dark:text-gray-100 font-bold">Datos de la Empresa</h3>
                </div>
                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                    <x-datepicker />
                    <!-- Add view button -->
                    <button  class="btn btn-verde bg-green-800 hover:bg-green-400 hover:text-green-900"
                        href="{{ route('companies.create') }}"
                        :class="{ 'cursor-not-allowed opacity-50': companyExists }" 
                        :disabled="companyExists">
                        <a class="text-white" href="{{ route('companies.create') }}">+ Registrar</a>
                    </button>
                    <a href=""></a>
                </div>
        </div>

        {{-- Star Table --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    Información Fiscal de  la Empresa
                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Visualización de los diferentes datos de fiscales que utiliza el sistema</p>
                </caption>
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                           Logo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>

                        <th scope="col" class="px-2 py-3">
                            RUT
                        </th>
                       

                        <th scope="col" class="px-6 py-3">
                            Ciudad
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Web
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Telefono
                        </th>
                       
                        <th scope="col" class="px-6 py-3">
                            Ver
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Editar
                        </th>
                       {{--  <th scope="col" class="px-6 py-3">
                            Eliminar
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company )
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                     <td class="px-4">
                            <div class="ml-3">
                                <img class="rounded-full  w-[40px] h-[40px] shadow-sm" src="{{ asset('storage/' . $company->image_path)}}" /> 
                            </div>
                        </td> 

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{$company->name}}
                        </th>

                                   
                        <td class="justify-center items-center">
                            {{$company->rut}}
                        </td>

                        <td class="px-6 py-4">
                            {{$company->city->name}}
                        </td>

                        <td class="px-6 py-4">
                            {{$company->web}}
                        </td>

                        <td class="px-6 py-4">
                            {{$company->phone}}
                        </td>

                        <td class="px-6 py-4">
                            <button><a href="{{ route('companies.show', $company->id) }}" class="text-blue-600">Ver</a></button>
                        </td>

                        <td class="px-6 py-4">
                            <button><a href="{{ route('companies.edit', $company->id) }}" class="text-yellow-600">Editar</a></button>
                        </td>
                                 
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Paginación -->
            <div class="mt-0">
                {{ $companies->links() }}
            </div>
           
        </div>
    </div>

</x-app-layout>