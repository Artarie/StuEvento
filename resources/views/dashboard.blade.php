<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
        <h1>Todos los eventos!</h1>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Localidad</th>
            <th>Fecha</th>
            <th>Creador</th>
          </tr>
        </thead>
        <tbody>
          @foreach($events as $event)
          <tr>
           
            <td>{{$event->title}}</td>
            <td>{{$event->description}}</td>
            <td>{{$event->location}}</td>
            <td>{{$event->date}}</td>
            <td>{{$event->user->name}}</td>

          </tr>
         @endforeach
        </tbody>

      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
