<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Level;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return view('intranet.news.index');
    }

    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();

        return view('intranet.news.create', compact('categories', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
            'published_at' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->published_at = $request->published_at;
        $news->user_id = auth()->user()->id;
        $news->category_id = $request->category_id;
        $news->level_id = $request->level_id;

        $news->save();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
            $news->save();
        }

        return redirect()->route('news.index')->with('success', 'Noticia creada exitosamente.');
    }

    public function show(News $news)
    {
        return view('intranet.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        $levels = Level::all();

        return view('intranet.news.edit', compact('news', 'categories', 'levels'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
            'published_at' => 'nullable|date',
            'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
        }

        $news->title = $request->title;
        $news->content = $request->content;
        $news->published_at = $request->published_at;
        $news->user_id = auth()->user()->id;
        $news->category_id = $request->category_id;
        $news->level_id = $request->level_id;

        $news->save();

        return redirect()->route('news.index')->with('success', 'Noticia actualizada exitosamente.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Noticia eliminada exitosamente.');
    }
}
