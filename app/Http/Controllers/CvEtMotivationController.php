<?php

namespace App\Http\Controllers;

use App\Models\Cv_et_motivation;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CvEtMotivationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id= Auth::id();
        $profil=Profil::where('user_id',$user_id)->first();
        $cv_et_motivation=Cv_et_motivation::where('profil_id',$profil->id)->get();
        
        return view('cv_et_motivation.index', compact('cv_et_motivation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cv_et_motivation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'cv' =>'nullable|file|mimes:pdf|max:2048',
            'motivation' => 'nullable|file|mimes:pdf|max:2048',
            'description' => 'nullable|string',
        ]);
        $user_id=Auth::id();
        if (!$user_id) {
            return redirect()->route('cv_et_motivation.index')->with('error', 'Utilisateur non authentifié');
        }
        $profil= Profil::where('user_id',$user_id)->first();
        $input=$request->all();
        $input['profil_id']=$profil->id;

        if ($request->hasFile('cv')) {
            /** @var UploadedFile $image */  
            $fichier = $request->file('cv');

            $fichierPath = $fichier->store('CVs', 'public');
            $input['cv'] = $fichierPath;
        }

        if ($request->hasFile('motivation')) {
            /** @var UploadedFile $image */  
            $fichier = $request->file('motivation');

            $fichierPath = $fichier->store('motivations', 'public');
            $input['motivation'] = $fichierPath;
        }

        Cv_et_motivation::create($input);
        return redirect()->route('cv_et_motivation.index')->with('success', 'CV et Motivation creer avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cv_et_motivation=Cv_et_motivation::findOrFail($id);
        return view('cv_et_motivation.show', compact('cv_et_motivation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cv_et_motivation=Cv_et_motivation::findOrFail($id);
        return view('cv_et_motivation.edit', compact('cv_et_motivation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cv_et_motivation=Cv_et_motivation::findOrFail($id);
        request()->validate([
            'cv' =>'nullable|file|mimes:pdf|max:2048',
            'motivation' => 'nullable|file|mimes:pdf|max:2048',
            'description' => 'nullable|string',
        ]);
        $user_id=Auth::id();
        if (!$user_id) {
            return redirect()->route('cv_et_motivation.index')->with('error', 'Utilisateur non authentifié');
        }
        $profil= Profil::where('user_id',$user_id)->first();
        $input=$request->all();
        $input['profil_id']=$profil->id;

        if ($request->hasFile('cv')) {
            // Supprimer l'ancienne image si elle existe
            if ($cv_et_motivation->cv) {
                Storage::disk('public')->delete($cv_et_motivation->cv);
            }

            // Stocker la nouvelle image
            $fichierPath = $request->file('cv')->store('CVs', 'public');
            $input['cv'] = $fichierPath;
        }

        if ($request->hasFile('motivation')) {
            // Supprimer l'ancienne image si elle existe
            if ($cv_et_motivation->motivation) {
                Storage::disk('public')->delete($cv_et_motivation->motivation);
            }

            // Stocker la nouvelle image
            $fichierPath = $request->file('motivation')->store('motivations', 'public');
            $input['motivation'] = $fichierPath;
        }

        $cv_et_motivation->update($input);
        return redirect()->route('cv_et_motivation.index')->with('success', 'CV et Motivation Modifier avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cv_et_motivation::destroy($id);
        return redirect()->route('cv_et_motivation.index')->with('success', 'CV et Motivation supprimer avec succes');
    }
}
