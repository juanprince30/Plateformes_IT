<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Competence;
use App\Models\Notification;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetenceController extends Controller
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
        $competence=Competence::where('user_id',$user_id)->get();

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('competence.index', compact('competence','notifications', 'totalnotification'));
        }
        
        return view('competence.index', compact('competence'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie=Categorie::select('id','libelle')->get();
        

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('competence.create', compact('categorie','notifications', 'totalnotification'));
        }
        return view('competence.create', compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'titre'=>'required',
            'description'=>'required',
            'categorie_id'=>'required',
        ]);

        $user_id=Auth::id();
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }

        $input=$request->all();
        $input['user_id']=$user_id;

        Competence::create($input);

        return redirect()->route('profile.edit');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $competence=Competence::findOrFail($id);

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('competence.show', compact('competence','notifications', 'totalnotification'));
        }
        return view('competence.show', compact('competence'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $competence=Competence::findOrFail($id);
        $categorie=Categorie::select('id','libelle')->get();

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('competence.edit', compact('competence', 'categorie','notifications', 'totalnotification'));
        }
        return view('competence.edit', compact('competence', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $competence=Competence::findOrFail($id);
        
        request()->validate([
            'titre'=>'required',
            'description'=>'required',
            'categorie_id'=>'required',
        ]);

        $user_id=Auth::id();
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }
        $input=$request->all();
        $input['user_id']=$user_id;

        $competence->update($input);
        return redirect()->route('competence.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Competence::destroy($id);
        return redirect()->route('profile.edit');
    }
}
