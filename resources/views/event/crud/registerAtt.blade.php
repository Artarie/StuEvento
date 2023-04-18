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
                    @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <form action="{{route('event.storeAttendee', $event->id)}}" method="post">
                        <div class="form-group" style="width: 75%; margin: auto;">
                            @csrf
                            @method('POST')
                            <br>

                            <h1> {{$event->title}} </h1>
                            <br>
                            <label>Escoge un asistente: </label>
                            <select class="form-select" name="attendee" id="attendee">
                                <option value="">-- Seleccionar asistente</option>
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>

                                @endforeach
                            </select>



                            <br>
                            <input type="submit" class="btn btn-primary" style="text-align:center;" value="Añadir asistente">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>