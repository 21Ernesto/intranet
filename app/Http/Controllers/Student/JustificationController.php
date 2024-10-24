<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Justification;
use Illuminate\Http\Request;

class JustificationController extends Controller
{
    public function index()
    {
        $justifications = Justification::all();

        return view('intranet.students.justifications.index', compact('justifications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,docx,jpg,jpeg,png',
        ]);

        $justification = new Justification();
        $justification->file = $request->file->store('public/justifications');
        $justification->user_id = auth()->user()->id;
        $justification->save();

        return redirect()->route('justificacion.index');
    }

    public function destroy(Justification $justification)
    {
        $justification->delete();

        return redirect()->route('justificacion.index');
    }
}
