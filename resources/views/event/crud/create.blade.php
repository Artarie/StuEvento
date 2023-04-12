<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  
                    <form action="{{route('event.store')}}" method="post">
                        <div class="form-group" style="width: 75%; margin: auto;">
                            @csrf
                            @method('POST')
                            <br>
                            Título <input type="text" name="title" class="form-control" />
                            <br>
                        
                            Descripción<input type="text" name="description" class="form-control" />
                            <br>
                            Localidad<input type="text" name="location" class="form-control" />
                            <br>
                            Fecha <input type="date" name="date" class="form-control" />


                            <br>
                            <input type="submit" class="btn btn-primary" style="text-align:center;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>