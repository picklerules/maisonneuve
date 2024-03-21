<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = Etudiant::join('users', 'etudiants.id', '=', 'users.id')
                    ->orderBy('users.name')
                    ->get(['etudiants.*', 'users.name as userName']); 
        return view('etudiant.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50',
            'adresse' => 'required|max:50',
            'telephone' =>'required|max:50',
            'date_naissance' =>'required',
            'ville_id' =>'required',
            'email' =>'required|email|unique:users',
            'password' => 'required|min:6|max:20'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $etudiant = Etudiant::create([
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id,
            'id' => $user->id
        ]);

        return redirect()->route('etudiant.show', ['etudiant' => $etudiant->id])->withSuccess(__('lang.create_student_success'));  

    }
    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        $users = User::all();
        return view('etudiant.show', ['etudiant' => $etudiant, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'name' => 'required|max:50',
            'adresse' => 'required|max:50',
            'telephone' =>'required|max:50',
            'date_naissance' =>'required',
            'ville_id' =>'required',
            'email' => 'required|email|unique:users,email,' . $etudiant->user->id
        ]);

        $etudiant->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $etudiant->update([
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect()->route('etudiant.show', ['etudiant' => $etudiant->id])->withSuccess(__('lang.edit_student_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('etudiant.index')->withSuccess(__('lang.delete_student_success'));
    }
}
