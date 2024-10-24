<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        return view('intranet.documents.index');
    }

    public function create()
    {
        $levels = Level::all();

        return view('intranet.documents.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_path' => 'required|file',
            'uploaded_at' => 'required|date',
            'level_id' => 'required|exists:levels,id',
        ]);

        $filePath = $request->file('file_path')->store('documents', 'public');
        $validated['file_path'] = $filePath;
        $validated['user_id'] = auth()->user()->id;

        Document::create($validated);

        return redirect()->route('documents.index')->with('success', 'Documento creado con éxito');
    }

    public function show(Document $document)
    {
        return view('intranet.documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        $levels = Level::all();

        return view('intranet.documents.edit', compact('document', 'levels'));
    }

    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file_path' => 'nullable|file',
            'uploaded_at' => 'required|date',
            'level_id' => 'required|exists:levels,id',
        ]);

        if ($request->hasFile('file_path')) {
            if (Storage::exists('public/'.$document->file_path)) {
                Storage::delete('public/'.$document->file_path);
            }

            $filePath = $request->file('file_path')->store('documents', 'public');
            $validated['file_path'] = $filePath;
        } else {
            unset($validated['file_path']);
        }

        $validated['user_id'] = auth()->user()->id;

        $document->update($validated);

        return redirect()->route('documents.index')->with('success', 'Documento actualizado con éxito');
    }

    public function destroy(Document $document)
    {
        if (Storage::exists('public/'.$document->file_path)) {
            Storage::delete('public/'.$document->file_path);
        }

        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Documento eliminado exitosamente.');
    }
}
