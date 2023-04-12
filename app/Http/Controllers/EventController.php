<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\UserEventAttendee;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $event = Event::where('user_id', Auth::user()->id)->get();

        return view('event.index', [
            'events' => $event,
        ]);
    }

    public function create()
    {
        return view('event.crud.create', [
           
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' =>  'required|max:255',
            'date' => 'required|date',
            'location' => 'required|max:255',
            ]);
            
        $event = new Event;
 
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->date = $validatedData['date'];
        $event->location = $validatedData['location'];
        $event->user_id = Auth::user()->id;
        $event->save();

        

        return redirect('/events')->with('success', 'Evento añadido correctamente!');
    }

    public function show($id)
    {
        $event = Event::find($id);

        if ($event) {
            $userNames = UserEventAttendee::where('event_id', $id)->with('user')->get()->pluck('user.name');

            return view('event.crud.show', [
                'event' => $event,
                'users' => $userNames,
                'found' => true
            ]);
        } else {
            return view('crud.view', ['found' => false])->with('error', 'No event found for ' . $id);
        } 
        
    }

    public function registerAttendee($id)
    {
        $event = Event::find($id);
        $users = User::all()->sortBy('name');
        return view('event.crud.registerAtt', [
            'event' => $event,
            'users' => $users,


        ]);
        
    }

    public function storeAttendee(Request $request, $id)
    {

        $event = new UserEventAttendee();

       
        
        $event->user_id =  $request->input('attendee');
        $event->event_id = $id;

        if (UserEventAttendee::where('user_id', '=', $request->input('attendee'))
        ->where('event_id', '=', $id)
        ->exists()) 
        {

            return redirect()->back()->with('error', 'Este asistente ya existe en el evento!');
            
         }else{

            $event->save();
            return redirect('/events')->with('success', 'Evento añadido con asistente correctamente!');

         }

        

    }

    public function edit($id)
    {
        $event = Event::find($id);

        $date = new DateTime($event->date);
        return view('event.crud.edit', [
            'event' => $event,
            'date' => $date,


        ]);
        
    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' =>  'required|max:255',
            'date' => 'required|date',
            'location' => 'required|max:255',
            ]);
            
    
       Event::where('id', '=', $id)->update(["title" => $validatedData['title'], "description" => $validatedData['description'], "date" => $validatedData['date'] ,"location" => $validatedData['location'] ]);

        return redirect('/events')->with('success', 'Evento actualizado correctamente!');
    }
}
