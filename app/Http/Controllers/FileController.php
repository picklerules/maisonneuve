<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::with('user')->orderBy('created_at', 'desc')->paginate(5);
        return view('file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'title_en' => 'nullable|required_without:title_fr|string|max:30',
            'title_fr' => 'nullable|required_without:title_en|string|max:30',
            'file' => 'required|file|mimes:pdf,zip,doc,docx',
        ]);
    
        $path = $request->file('file')->store('public/documents');
    
        $file = new File();
        $file->title = json_encode(['en' => $request->title_en, 'fr' => $request->title_fr]);
        $file->file_path = $path;
        $file->user_id = auth()->id();
        $file->save();
    
        return redirect()->route('file.index')->withSuccess('Document shared successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {

        if (auth()->id() !== $file->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $file->title = json_decode($file->title, true);

        return view('file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {

        if (auth()->id() !== $file->user_id) {
            abort(403, 'Unauthorized action.');
        }
    
        $request->validate([
            'title_en' => 'nullable|required_without:title_fr|string|max:30',
            'title_fr' => 'nullable|required_without:title_en|string|max:30',
            'file' => 'sometimes|file|mimes:pdf,zip,doc,docx',
        ]);
    

        $titles = [];
        if ($request->title_en) {
            $titles['en'] = $request->title_en;
        }
        if ($request->title_fr) {
            $titles['fr'] = $request->title_fr;
        }
    
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/documents');
            $file->file_path = $path;
        }

        $file->title = json_encode($titles);
        $file->save();
    
        return redirect()->route('file.index')->withSuccess('File updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        if (auth()->id() !== $file->user_id) {
            return redirect()->route('file.index')->with('error', 'Vous n\'êtes pas autorisé à effectuer cette action.');
        }
    
        Storage::delete($file->file_path);
    
        $file->delete();
    
        return redirect()->route('file.index')->with('success', 'Le fichier a été supprimé avec succès.');
    }
}
