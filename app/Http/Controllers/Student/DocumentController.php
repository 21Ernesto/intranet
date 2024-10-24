<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Level;

class DocumentController extends Controller
{
    public function index()
    {
        $userLevel = auth()->user()->level_id;
        $levelNA = Level::where('name', 'N/A')->first()->id;

        $documents = Document::where(function ($query) use ($userLevel, $levelNA) {
            $query->where('level_id', $userLevel)
                ->orWhere('level_id', $levelNA);
        })->get();

        return view('intranet.students.documents.index', compact('documents'));
    }

    public function show($id)
    {
        $document = Document::findOrFail($id);

        return view('intranet.students.documents.show', compact('document'));
    }
}
