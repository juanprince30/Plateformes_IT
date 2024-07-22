<?php

namespace App\Http\Controllers;

use App\Models\Candidacture;
use App\Models\Categorie;
use App\Models\Discussion;
use App\Models\Notification;
use App\Models\Offre;
use App\Models\User;
use App\Models\Visite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OffreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer toutes les offres (ou les offres pertinentes pour votre application)
        $offres = Offre::all();

        // Parcourir chaque offre pour déterminer son état en fonction des dates
        foreach ($offres as $offre) {
            $etat_offre = 'En attente';

            if (now()->greaterThanOrEqualTo($offre->date_debut_offre)) {
                $etat_offre = 'Offre publiée';
            }

            if (now()->greaterThan($offre->date_fin_offre)) {
                $etat_offre = 'Terminer';
            }

            // Mettre à jour l'état de l'offre dans la base de données
            $offre->update(['etat_offre' => $etat_offre]);
        }

        // Récupérer uniquement les offres publiées pour l'affichage
        $offresPubliees = Offre::where('etat_offre', 'Offre publiée')->paginate(10);

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

            return view('offre.index', compact('offresPubliees', 'notifications', 'totalnotification','user'));
        }

        return view('offre.index', compact('offresPubliees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        $categories = Categorie::all();

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('offre.create', compact('categories', 'notifications', 'totalnotification'));
        }

        return view('offre.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login'); 
        }
        else
        {
            $data = $request->validate([
                'titre' => 'required|string|max:255',
                'type_offre' => 'required|string|max:255',
                'ville' => 'required|string|max:255',
                'pays' => 'required|string|max:255',
                'prix' =>'nullable|numeric|min:0',
                'salaire' => 'nullable|numeric|min:0',
                'experience_requis' => 'nullable|numeric|min:0',
                'responsabilite' => 'required|string',
                'competence_requis' => 'required|string',
                'date_debut_offre' => 'required|date',
                'date_fin_offre' => 'required|date|after_or_equal:date_debut_offre',
                'categorie_id' => 'required|integer|exists:categories,id',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'email' => 'required|string',
                'website' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=150,height=150',
                'entreprise' => 'required|string',
                'niveau_etude' => 'required|string'
            ]);
    
            $data['user_id'] = Auth::id();
            $data['etat_offre'] = 'En attente';
    
            if (now()->greaterThanOrEqualTo($data['date_debut_offre'])) {
                $data['etat_offre'] = 'Offre publiée';
            }
    
            if (now()->greaterThan($data['date_fin_offre'])) {
                $data['etat_offre'] = 'Terminer';
            }
    
            if ($request->hasFile('image')) {
                /** @var UploadedFile $image */  
                $fichier = $request->file('image');
    
                $fichierPath = $fichier->store('images', 'public');
                $data['image'] = $fichierPath;
            }
    
            if ($request->hasFile('logo')) {
                /** @var UploadedFile $image */  
                $fichier = $request->file('logo');
    
                $fichierPath = $fichier->store('logos', 'public');
                $data['logo'] = $fichierPath;
            }
            
            $offre=Offre::create($data);
    
            
            /*Créer une notification pour l'utilisateur qui a créé l'offre*/
            Notification::create([
                'type' => 'Nouvelle Offre creer',
                'message' => 'Vous avez creer une nouvelle Offre \''.$offre->titre.'\' avec succès.',
                'user_id' => $offre->user_id, // Utilisateur qui a créé l'offre
                'offre_id' => $offre->id,
            ]);
    
            return redirect()->route('offre.index', $offre)->with('message', 'Offre créée avec succès.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $offre = Offre::with('candidacture')->findOrFail($id);
        $user = auth()->user();
        $hasApplied = false;

        if ($user) {
            // Charger les candidatures de l'utilisateur
            $hasApplied = $user->candidacture->where('offre_id', $id)->isNotEmpty();
        }

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('offre.show', compact('offre', 'hasApplied', 'notifications', 'totalnotification'));
        }

        return view('offre.show', compact('offre', 'hasApplied'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $offre=Offre::findOrFail($id);

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('offre.edit', compact('offre', 'notifications', 'totalnotification'));
        }

        return view('offre.edit', compact('offre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login'); 
        } 
        else 
        {
            $offre=Offre::findOrFail($id);
            $data = $request->validate([
                'titre' => 'required|string|max:255',
                'type_offre' => 'required|string|max:255',
                'ville' => 'required|string|max:255',
                'pays' => 'required|string|max:255',
                'prix' =>'nullable|numeric|min:0',
                'salaire' => 'nullable|numeric|min:0',
                'experience_requis' => 'nullable|numeric|min:0',
                'responsabilite' => 'required|string',
                'competence_requis' => 'required|string',
                'date_debut_offre' => 'required|date',
                'date_fin_offre' => 'required|date|after_or_equal:date_debut_offre',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'email' => 'required|string',
                'website' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=150,height=150',
                'entreprise' => 'required|string',
                'niveau_etude' => 'required|string'
            ]);

            $data['user_id'] = Auth::id();
            $data['etat_offre'] = 'En attente';

            if (now()->greaterThanOrEqualTo($data['date_debut_offre'])) {
                $data['etat_offre'] = 'Offre publiée';
            }

            if (now()->greaterThan($data['date_fin_offre'])) {
                $data['etat_offre'] = 'Terminer';
            }

            if ($request->hasFile('logo')) {
                // Supprimer l'ancienne image si elle existe
                if ($offre->logo) {
                    Storage::disk('public')->delete($offre->logo);
                }

                $fichierPath = $request->file('logo')->store('logos', 'public');
                $data['logo'] = $fichierPath;
            }

            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($offre->image) {
                    Storage::disk('public')->delete($offre->image);
                }

                $fichierPath = $request->file('image')->store('images', 'public');
                $data['image'] = $fichierPath;
            }

            $offre->update($data);

            return redirect()->route('offre.mesoffre', $offre)->with('message', 'Offre mise à jour avec succès.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offre $offre)
    {
        $offre->delete();
        return redirect()->route('offre.index')->with('message', 'Offre supprimée avec succès.');
    }

    public function mesoffre()
    {
        $offres = Offre::where('user_id', Auth::id())->paginate(10);

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('offre.mesoffre', compact('offres', 'notifications', 'totalnotification'));
        }
        return view('offre.mesoffre', compact('offres'));
    }

    public function showmesoffre($offre)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login'); 
        }
        $offre = Offre::where('user_id', Auth::id())->find($offre);
        if (!$offre) {
            abort(404, 'Offre non trouvée');
        }
        $candidatures = $offre->Candidacture->sortByDesc('point');

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('offre.showmesoffre', ['offre' => $offre, 'candidatures' => $candidatures], compact('notifications', 'totalnotification'));
        }

        return view('offre.showmesoffre', ['offre' => $offre, 'candidatures' => $candidatures]);
    }

    public function showmescandidat($id)
    {
        if (!Auth::check()) 
        {
            return redirect()->route('login'); 
        }
        $candidature = Candidacture::findOrfail($id);

        if (Auth::check()) 
        {   
            $user_id= Auth::id();
            $notifications= Notification::where('user_id',$user_id)->where('etat','Pas lu')->get();
            $totalnotification=$notifications->count();

            return view('offre.candidat', compact('candidature','notifications', 'totalnotification'));
        }

        return view('offre.candidat', compact('candidature'));
    }

    public function jobsRecents()
    {
        $offres = Offre::latest()->paginate(7); // Récupère les 7 offres les plus récentes
        $discussions = Discussion::latest()->paginate(7);
        $totaldiscussions =Discussion::count();
        $totalOffres = Offre::count(); // Nombre total d'emplois
        $visit = Visite::first();
        $visite = $visit->visit_count;
        $totalcandidacture= Candidacture::count();

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

            if($user->competence) {
                $categorie_recommender = [];
                foreach($user->competence as $item) {
                    if (!in_array($item->categorie_id, $categorie_recommender)) {
                        $categorie_recommender[] = $item->categorie_id;
                    }
                }
            
                $offrerecommender = [];
                $discussionrecommender = [];
                foreach($categorie_recommender as $categori) {
                    $offre = Offre::where('categorie_id', $categori)->get();
                    foreach($offre as $item) {
                        $offrerecommender[] = $item;
                    }
            
                    $discussion = Discussion::where('categorie_id', $categori)->get();
                    foreach($discussion as $item) {
                        $discussionrecommender[] = $item;
                    }
                }
            }
                 
            

            return view('main.main', compact('offrerecommender', 'discussionrecommender','totalcandidacture','visite','offres','totaldiscussions', 'totalOffres','discussions', 'notifications', 'totalnotification','user'));
        }
        else
        {
            return view('main.main', compact('totalcandidacture','visite','offres', 'totalOffres','discussions','totaldiscussions'));
        }

       
    }

    
    // OffreController.php
    // OffreController.php
    public function terminerTraitement($offreId)
    {
        // Trouver l'offre par son ID
        $offre = Offre::find($offreId);

        if ($offre) {
            // Rejeter toutes les candidatures en attente pour cette offre
            Candidacture::where('offre_id', $offreId)
                ->where('etat_candidature', 'En attente')
                ->update(['etat_candidature' => 'Rejeter']);
        }

        return redirect()->route('offre.showmesoffre', $offreId)->with('success', 'Le traitement des candidatures est terminé.');
    }


    public function filterByType($type)
    {
        $offres = Offre::where('type_offre', $type)->where('etat_offre', 'Offre publiée')->get();
        return response()->json($offres);
    }

    public function getAllOffres()
    {
        $offres = Offre::where('etat_offre', 'Offre publiée')->get();
        return response()->json($offres);
    }

    public function admin_offre()
    {
        $user_id = Auth::id();
        $user=User::where('id',$user_id)->first();
        if($user->role== 'admin')
        {
            $offres=Offre::all();
            return view('admin_offre.index', compact('offres'));
        }
        else
        {
            abort(403, ' INTERDIT !! ');
        }
    }

    public function admin_user()
    {
        $user_id = Auth::id();
        $user=User::where('id',$user_id)->first();
        if($user->role== 'admin')
        {
            $users=User::all();
            return view('admin_offre.user', compact('users'));
        }
        else
        {
            abort(403, ' INTERDIT !! ');
        }
    }
}
