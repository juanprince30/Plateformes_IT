<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Certification;
use App\Models\Competence;
use App\Models\Cv_et_motivation;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user_id= Auth::id();
        $certifications=Certification::where('user_id',$user_id)->get();
        $competences=Competence::where('user_id',$user_id)->get();
        $cv_et_motivations=Cv_et_motivation::where('user_id',$user_id)->get();
        $experiences=Experience::where('user_id',$user_id)->get();

        return view('profile.edit', [
            'user' => $request->user(),'certifications' =>$certifications, 'competences' => $competences,
            'cv_et_motivations' => $cv_et_motivations, 'experiences' => $experiences,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Récupérer l'utilisateur actuellement authentifié
        $user = $request->user();

        // Récupérer les données validées de la requête
        $validatedData = $request->validated();

        // Vérification de la présence d'un fichier image dans la requête
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            // Stocker la nouvelle image
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Remplir l'objet utilisateur avec les données validées
        $user->fill($validatedData);

        // Vérifier si l'email a été modifié
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Sauvegarder les modifications dans la base de données
        $user->save();

        // Rediriger vers la route de modification du profil avec un message de succès
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
