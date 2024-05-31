<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id= Auth::id();
        $profil= Profil::where('user_id',$user_id)->get();
        
        return view('profil.index', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'telephone_2'=>'required',
            'ville'=>'required',
            'niveau_etude'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id=Auth::id();
        $input= $request->all();
        $input['user_id']= $user_id;

        /** @var UploadedFile $image */  
        $image = $request->file('image');

        if ($request->hasFile('image')) {
            $imagePath = $image->store('images', 'public');
            $input['image'] = $imagePath;
        }
        Profil::create($input);
        return redirect()->route('profil.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profil=Profil::findOrFail($id);
        return view('profil.show',compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $profil=Profil::findOrFail($id);
        return view('profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $profil = Profil::findOrFail($id);

        request()->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone_2' => 'required',
            'ville' => 'required',
            'niveau_etude' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user_id = Auth::id();
        $input = $request->all();
        $input['user_id'] = $user_id;

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($profil->image) {
                Storage::disk('public')->delete($profil->image);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $input['image'] = $imagePath;
        }

        $profil->update($input);

        return redirect()->route('profil.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Profil::destroy($id);
        return redirect()->route('profil.index');
    }
}
