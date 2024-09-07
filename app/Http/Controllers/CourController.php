<?php

namespace App\Http\Controllers;

use App\Models\Cour;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }
        $cours = Cour::orderBy('created_at', 'desc')->get();

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

            return view('cours.index', compact('cours','notifications', 'totalnotification','user'));
        }
        return view('cours.index', compact('cours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('cours.create', compact('notifications', 'totalnotification'));
        }
        return view('cours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
                'titre' => 'required|string',
                'description' => 'required|string',
                'contenu' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $input=$request->all();

            if ($request->hasFile('image')) {
                /** @var UploadedFile $image */  
                $fichier = $request->file('image');
    
                $fichierPath = $fichier->store('images', 'public');
                $input['image'] = $fichierPath;
            }
    
            Cour::create($input);
            return redirect()->route('cours.index')->with('success', 'Cours creer avec succes');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cour $cour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cour $cour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cour $cour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cour $cour)
    {
        //
    }
}
