<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseManager extends Component
{
    public $search;

    public function render()
    {
        $courses = Course::where('code', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.course-manager', compact('courses'));
    }
}
