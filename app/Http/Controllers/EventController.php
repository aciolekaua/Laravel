<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Psy\CodeCleaner\ReturnTypePass;
use Symfony\Component\HttpFoundation\RequestStack;

class EventController extends Controller
{

    private $events;

    public function __construct()
    {
        $this->events = New Event;
    }

    public function index(){
        $search = request('search');
        if($search){
            $this->events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        }else {
            $this->events = Event::all();
        }
        return view('welcome',['events'=>$this->events, 'search'=> $search]);

    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $this->events->title = $request->title;
        $this->events->date = $request->date;
        $this->events->city = $request->city;
        $this->events->private = $request->private;
        $this->events->description = $request->description;
        $this->events->items = $request->items;
        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $this->events->image = $imageName;
        }

        $user = auth()->user();

        $this->events->user_id = $user->id;

        $this->events->save();
        
        return redirect('/')->with('msg','Evento criado com sucesso');
    }


    public function show($id){
        $this->events = Event::findOrFail($id);

        $user = auth()->user();

        $hasUserJoined = false;

        if($user){
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hasUserJoined = true;
                }
            }
        }

        $eventOwner = User::where('id', $this->events->user_id)->first()->toArray();

        return view('events.show',['event' => $this->events, 'eventOwner' =>$eventOwner,"hasUserJoined"=>$hasUserJoined]);
    }


    public function dashboard(){
        $user = auth()->user();

        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard',['events'=>$events,"eventsasparticipant"=>$eventsAsParticipant]);
    }


    public function destroy($id){
        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg','Evento deletado com sucesso!'); 
    }

    public function edit($id){

        $user = auth()->user();

        $this->events = Event::findOrFail($id);

        if($user->id != $this->events->user_id) {
            return redirect('/dashboard');
        }

        return view('events.edit',['event'=>$this->events]);
    }

    public function update(Request $request){

        $data = $request->all();
        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")). "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        }


        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg','Evento Alterado com sucesso com sucesso!'); 
    }

    public function joinEvent($id){
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $this->events = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg','Sua presença foi confirmada '.$this->events->title);
    }

    public function leaveEvent($id){
        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $this->events = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg','Você saiu do Evento '.$this->events->title);

    }  
}
