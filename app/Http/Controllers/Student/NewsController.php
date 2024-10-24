<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $userLevel = auth()->user()->level_id;
        $levelNA = Level::where('name', 'N/A')->first()->id;

        $news = News::where(function ($query) use ($userLevel, $levelNA) {
            $query->where('level_id', $userLevel)
                ->orWhere('level_id', $levelNA);
        })->get();

        return view('intranet.students.news.index', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);

        return view('intranet.students.news.show', compact('news'));
    }
}
