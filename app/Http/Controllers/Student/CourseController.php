<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Level;

class CourseController extends Controller
{
    public function index()
    {
        $userLevel = auth()->user()->level_id;
        $levelNA = Level::where('name', 'N/A')->first()->id;

        $courses = Course::where(function ($query) use ($userLevel, $levelNA) {
            $query->where('level_id', $userLevel)
                ->orWhere('level_id', $levelNA);
        })->get();

        return view('intranet.students.courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::with('courseMaterials')->findOrFail($id);

        return view('intranet.students.courses.show', compact('course'));
    }
}
