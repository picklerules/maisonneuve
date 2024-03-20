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
        $files = File::with('user')->paginate(10);
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
            'title_en' => 'required_without:titre_fr|string|max:30',
            'title_fr' => 'nullable|string|max:30',
            'file' => 'required|file|mimes:pdf,zip,doc,docx',
        ]);
    
        $path = $request->file('file')->store('public/documents');
    
        $file = new File();
        $file->title = json_encode(['en' => $request->title_en, 'fr' => $request->title_fr]);
        $file->file_path = $path;
        $file->user_id = auth()->id();
        $file->save();
    
        return back()->withSuccess('Document shared successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
