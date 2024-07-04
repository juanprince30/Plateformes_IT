<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Discussion;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discussions = Discussion::paginate(10);
        

        return view('discussion.index', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('discussion.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'sujet'=>'required|string|max:255',
            'contenu'=>'required|string',
            'etat'=>'required|string',
            'categorie_id'=>'required|integer|exists:categories,id',
        ]);

        $data['user_id']=Auth::id();
        $discussion=Discussion::create($data);
        return redirect()->route('discussion.index', $discussion)->with('message', 'Discussion créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    /* public function show(Discussion $discussion)
    {
        //
    } */
 
    // App\Http\Controllers\DiscussionController.php
    public function show($id)
    {
        $discussion = Discussion::findOrFail($id);
        $reponses = $discussion->reponses()->orderBy('created_at', 'desc')->take(10)->get();

        return view('discussion.show', compact('discussion', 'reponses'));
    }

    // Exemple de contrôleur Laravel
    public function loadMore($discussionId, $offset)
    {
        $reponses = Reponse::where('discussion_id', $discussionId)
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->skip($offset)
            ->take(10)
            ->get()
            ->map(function($reponse) {
                return [
                    'user' => $reponse->user->only('name'),
                    'created_at' => $reponse->created_at->format('Y-m-d H:i:s'),
                    'contenu' => $reponse->contenu,
                ];
            });
        
        return response()->json($reponses);
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $discussions = Discussion::whereHas('categorie', function($q) use ($query) {
            $q->where('name', 'like', '%' . $query . '%');
        })->paginate(10);
    
        return response()->json([
            'discussions' => $discussions->items(),
            'pagination' => (string) $discussions->links()
        ]);
    }
    
    


    


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discussion $discussion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discussion $discussion)
    {
        //
    }
}
