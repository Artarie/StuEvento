<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div style="width: 90%; margin: auto;">
                <div>
      <a href="{{route('event.create')}}" type="button" class="btn btn-primary">CREAR EVENTO</a>
    </div>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Localidad</th>
            <th>Fecha</th>
            <th>Asistentes</th>
          </tr>
        </thead>
        <tbody>
          <tr>

            <td>{{$event->title}}</td>
            <td>{{$event->description}}</td>
            <td>{{$event->location}}</td>
            <td>{{$event->date}}</td>
            <td>@foreach($users as $user)
              {{ $user}}
              <br>
                @endforeach
            </td>
          </tr>
        </tbody>

      </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
