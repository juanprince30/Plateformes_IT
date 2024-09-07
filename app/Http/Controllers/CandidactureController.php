<?php

namespace App\Http\Controllers;

use App\Models\Candidacture;
use App\Models\Notification;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidatures = Candidacture::where('user_id', Auth::id())->get();

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

            return view('postuler.index', compact('candidatures','notifications', 'totalnotification','user'));
        }
        return view('postuler.index', compact('candidatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $offreId = $request->query('offre');
        $offre = Offre::findOrFail($offreId);

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('postuler.create', compact('offre','notifications', 'totalnotification'));
        }

        return view('postuler.create', compact('offre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'motivation' => 'required|string',
        'description' => 'nullable|string',
        'offre_id' => 'required|exists:offres,id',
    ]);
    $data['etat_candidature'] = 'En attente';
    $data['user_id'] = Auth::id();

    // Créer la candidature
    $candidature = Candidacture::create($data);


    $offre = Offre::find($request->offre_id);
    $user = Auth::user();

    /*Créer une notification pour l'utilisateur qui a créé l'offre*/
    Notification::create([
        'type' => 'Nouvelle Candidature',
        'message' => 'Une nouvelle candidature a été soumise pour votre offre.',
        'user_id' => $offre->user_id, // Utilisateur qui a créé l'offre
        'candidacture_id' => $candidature->id,
        'offre_id' => $offre->id,
    ]);

    Notification::create([
        'type' => 'Candidature à une offre',
        'message' => 'Confirmation de votre candidature à l\'offre: '.$offre->titre.'.',
        'user_id' => $candidature->user_id, // Utilisateur qui a soumis sa candidature
        'candidacture_id' => $candidature->id,
        'offre_id' => $offre->id,
    ]);

    $point=0;

    $ville_offre= $offre->ville;
    $niveau_etude_offre= $offre->niveau_etude;
    // $competence_offre= $offre->competence_requis;
    $competence_offre = explode(' ', preg_replace('/[\s,]+/', ' ', $offre->competence_requis));

    if($user->ville)
    {
        if($user->ville == $ville_offre)
        {
            $point++;
        }
    }
    if($user->niveau_etude)
    {
        if($user->niveau_etude == $niveau_etude_offre)
        {
            $point += 2;
        }
    }
    if($user->competence)
    {
        foreach($user->competence as $item)
        {
            if (in_array($item->titre, $competence_offre)) {
                $point += 2;
            }
        }
    }

    $candidature->point = $point;
    $candidature->save();


    return redirect()->route('postuler.index')->with('message', 'Candidature soumise avec succès');
}


    /**
     * Display the specified resource.
     */
    public function show(Candidacture $candidature)
    {
        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('postuler.show', ['candidature' => $candidature], compact('offre','notifications', 'totalnotification'));
        }
        return view('postuler.show', ['candidature' => $candidature]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidacture $candidature)
    {
        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('postuler.edit', ['candidature' => $candidature], compact('offre','notifications', 'totalnotification'));
        }
        return view('postuler.edit', ['candidature' => $candidature]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidacture $candidature)
    {
        $data = $request->validate([
            'motivation' => 'required|string',
            'description' => 'nullable|string',
            'offre_id' => 'required|exists:offres,id',
        ]);

        $data['user_id'] = Auth::id();

        $candidature->update($data);

        return redirect()->route('offres.show', ['offre' => $data['offre_id']])->with('message', 'Candidature mise à jour avec succès');
    }

    public function updateStatus(Request $request, $id)
    {
        $candidature = Candidacture::findOrFail($id);
        $offre = $candidature->offre;

        // Vérifiez si l'utilisateur connecté est le créateur de l'offre
        if (Auth::user()->id !== $offre->user_id) {
            return redirect()->route('offre.show', $offre->id)->with('error', 'Vous n\'êtes pas autorisé à modifier cette candidature.');
        }

        $request->validate([
            'etat_candidature' => 'required',
        ]);

        $candidature->etat_candidature = $request->input('etat_candidature');
        $candidature->save();

        Notification::create([
            'type' => 'Vous avez un retour pour Candidature.',
            'message' => 'Votre Candidacture à l\'offre ' .$offre->titre.' à ete ' .$candidature->etat_candidature .'.',
            'user_id' => $candidature->user_id, // Utilisateur qui a soumis sa candidature
            'candidacture_id' => $candidature->id,
            'offre_id' => $offre->id,
        ]);

        return redirect()->route('offre.showmesoffre', $offre->id)->with('success', 'État de la candidature mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidacture $candidature)
    {
        $candidature->delete();
        return redirect()->route('offres.index')->with('message', 'Candidature supprimée');
    }
}
