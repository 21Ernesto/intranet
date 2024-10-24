<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseMaterialController extends Controller
{
    public function show(Course $course)
    {
        return view('intranet.coursesmaterial.index', compact('course'));
    }
}
