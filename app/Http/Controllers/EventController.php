<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     *
     * 
     */
    public function index()
    {
        $events = Event::all();

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            $user = Auth::user();

            // Vérifiez si le profil de l'utilisateur est complet
            $profileIncomplete = false;
            if (empty($user->telephone_2) || empty($user->ville) || empty($user->niveau_etude) || empty($user->image) || empty($user->description) || empty($user->telepone) || empty($user->addresse) || empty($user->statut) || empty($user->date_naissance) || empty($user->competence) || empty($user->experience) || empty($user->certification) || empty($user->cv_et_motivation) ) {
                // Ajoutez d'autres champs de profil que vous souhaitez vérifier
                $profileIncomplete = true;
            }
            else
            {
                $profileIncomplete = false;
            }

            // Si le profil est incomplet, définir une variable de session
            if ($profileIncomplete) {
                session(['profile_incomplete' => true]);
            } else {
                session()->forget('profile_incomplete');
            }

            return view('evenement.index', compact('events', 'notifications', 'totalnotification','user'));
        }
        return view('evenement.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     *
     * 
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('evenement.create', compact('notifications', 'totalnotification'));
        }
        return view('evenement.create');
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:start_datetime',
            'lieu' => 'nullable',
            'type' => 'required|in:webinar,salon', // Assurez-vous que le type est soit 'webinar' ou 'salon'
        ]);

        $event = Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified event.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('evenement.show', compact('event','notifications', 'totalnotification'));
        }
        return view('evenement.show', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('evenement.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:start_datetime',
            'lieu' => 'nullable',
            'type' => 'required|in:webinar,salon', // Assurez-vous que le type est soit 'webinar' ou 'salon'
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
}
