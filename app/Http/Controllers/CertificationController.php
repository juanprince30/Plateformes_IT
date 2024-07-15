<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Notification;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }

        $user_id= Auth::id();
        $certification=Certification::where('user_id',$user_id)->get();

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('certification.index',compact('certification','notifications', 'totalnotification'));
        }
        
        return view('certification.index',compact('certification'));
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

            return view('certification.create',compact('notifications', 'totalnotification'));
        }
        return view('certification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:200',
            'nom_institut' => 'required|string|max:200',
            'date_dobtention' => 'required|date',
            'fichier' => 'required|file|mimes:pdf|max:2048',
        ]);
        
        $user_id=Auth::id();
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }
        
        $input=$request->all();
        $input['user_id']=$user_id;

        
        if ($request->hasFile('fichier')) {
            /** @var UploadedFile $image */  
            $fichier = $request->file('fichier');

            $fichierPath = $fichier->store('fichiers', 'public');
            $input['fichier'] = $fichierPath;
        }
        Certification::create($input);

        return redirect()->route('profile.edit')->with('success', 'Experience creer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $certification=Certification::findOrFail($id);

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('certification.show', compact('certification','notifications', 'totalnotification'));
        }
        return view('certification.show', compact('certification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $certification=Certification::findOrFail($id);

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('certification.edit', compact('certification','notifications', 'totalnotification'));
        }
        return view('certification.edit', compact('certification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $certification=Certification::findOrFail($id);
        $request->validate([
            'titre' => 'required|string|max:200',
            'nom_institut' => 'required|string|max:200',
            'date_dobtention' => 'required|date',
            'fichier' => 'file|mimes:pdf|max:2048',
        ]);
        
        $user_id=Auth::id();
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }
        
        $input=$request->all();
        $input['user_id']=$user_id;

        if ($request->hasFile('fichier')) {
            // Supprimer l'ancienne image si elle existe
            if ($certification->fichier) {
                Storage::disk('public')->delete($certification->fichier);
            }

            // Stocker la nouvelle image
            $fichierPath = $request->file('fichier')->store('fichier', 'public');
            $input['fichier'] = $fichierPath;
        }
        $certification->update($input);

        return redirect()->route('certification.index')->with('success', 'Experience modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Certification::destroy($id);
        return redirect()->route('profile.edit');
    }
}
