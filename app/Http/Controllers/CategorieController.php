<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    /**search for a categorie */
    public function search(Request $request)
    {
        $query = $request->input('q');
        $result = Categorie::where('libelle', 'LIKE', "%{$query}%")->get();
        return response()->json($result);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
        }

        $categorie=Categorie::all();

        return view('categorie.index', compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = Categorie::all();
        return view('offre.create', compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'libelle'=>'required',
        ]);
        $input=$request->all();
        Categorie::create($input);
        
        return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorie=Categorie::findOrFail($id);
        return view('categorie.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie=Categorie::findOrFail($id);
        return view('categorie.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorie=Categorie::findOrFail('$id');
        request()->validate([
            'libelle'=>'required',
        ]);
        $input=$request->all();
        $categorie->update($input);
        
        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Categorie::destroy($id);
        return redirect()->route('categorie.index');
    }
}
