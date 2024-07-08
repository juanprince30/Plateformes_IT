<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Notification;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($discussion_id)
    {
        $discussion = Discussion::findOrFail($discussion_id);
        return view('reponse.create', compact('discussion'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'contenu'=>'required|string',
            'discussion_id'=>'required|integer|exists:discussions,id'
        ]);
        $data['user_id']=Auth::id();
        $reponse=Reponse::create($data);
        $discussion = Discussion::find($request->input('discussion_id'));

        Notification::create([
            'type' => 'Vous avez une reponse',
            'message' => $reponse->user->name.' à repondu à votre discussion .',
            'user_id' => $discussion->user_id, // Utilisateur qui a créé la discussion
            'discussion_id' => $discussion->id,
        ]);

        // Rediriger vers la vue de la discussion avec un message de succès
        // Rediriger vers la vue de la discussion avec un message de succès
        return redirect()->route('discussion.show', ['id' => $discussion->id])
        ->with([
            'message' => 'Discussion répondue avec succès.',
            'reponse' => $reponse
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Reponse $reponse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reponse $reponse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reponse $reponse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reponse $reponse)
    {
        //
    }
}