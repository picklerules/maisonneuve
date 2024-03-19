<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre_en' => 'nullable|max:255',
            'contenu_en' => 'nullable',
            'titre_fr' => 'nullable|max:255',
            'contenu_fr' => 'nullable',
        ]);

        //Vérifier que le champs sont remplis en anglais ou en français
        if (empty($request->titre_en) && empty($request->contenu_en) && empty($request->titre_fr) && empty($request->contenu_fr)) {
            return back()->withErrors('Au moins une langue doit être remplie.');
        }
    
        // Vérifier si le titre et le contenu sont de la même langue
        $inconsistentLanguage = false;
        if (!empty($request->titre_en) || !empty($request->contenu_en)) {
            if (empty($request->titre_en) || empty($request->contenu_en)) {
                $inconsistentLanguage = true;
            }
        }
        if (!empty($request->titre_fr) || !empty($request->contenu_fr)) {
            if (empty($request->titre_fr) || empty($request->contenu_fr)) {
                $inconsistentLanguage = true;
            }
        }
    
        if ($inconsistentLanguage) {
            return back()->withErrors('Le titre et le contenu doivent être de la même langue.');
        }


        $titre = ['en' => $request->titre_en];
        $contenu = ['en' => $request->contenu_en];

        if($request->contenu_fr != null) { 
            $contenu = $contenu + ['fr' => $request->contenu_fr];
        };

        if($request->titre_fr != null) { 
            $titre = $titre + ['fr' => $request->titre_fr];
        };
        
        Article::create([
            'titre' => $titre,
            'contenu' => $contenu,
            'user_id' => auth()->id()
        ]);

        return back()->withSuccess('Article published successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
