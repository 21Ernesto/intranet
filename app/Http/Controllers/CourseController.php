<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        return view('intranet.courses.index');
    }

    public function create()
    {
        $levels = Level::all();

        return view('intranet.courses.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:courses|max:255',
            'name' => 'required|max:255',
            'description' => 'required',
            'level_id' => 'required|exists:levels,id',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Course::create($validatedData);

        return redirect()->route('courses.index')
            ->with('success', 'Curso creado correctamente');
    }

    public function show(Course $course)
    {
        return view('intranet.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $levels = Level::all();

        return view('intranet.courses.edit', compact('course', 'levels'));
    }

    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'code' => 'required|max:255|unique:courses,code,'.$course->id,
            'name' => 'required|max:255',
            'description' => 'required',
            'level_id' => 'required|exists:levels,id',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        $course->update($validatedData);

        return redirect()->route('courses.index')
            ->with('success', 'Curso actualizado correctamente');
    }

    public function destroy(Course $course)
    {
        if (Storage::exists('public/'.$course->file_path)) {
            Storage::delete('public/'.$course->file_path);
        }

        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
