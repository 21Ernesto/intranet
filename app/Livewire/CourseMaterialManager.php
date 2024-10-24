<?php

namespace App\Livewire;

use App\Models\CourseMaterial;
use Livewire\Component;
use Livewire\WithFileUploads;

class CourseMaterialManager extends Component
{
    use WithFileUploads;

    public $title;

    public $description;

    public $file;

    public $course_id;

    public $courseMaterials;

    public $isOpen = 0;

    public $courseMaterialId;

    public function mount($courseId)
    {
        $this->course_id = $courseId;
        $this->courseMaterials = CourseMaterial::where('course_id', $this->course_id)->get();
    }

    public function render()
    {
        return view('livewire.course-material-manager');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->file = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'file' => 'required',
        ]);

        $filePath = $this->file->store('public/course_materials');

        CourseMaterial::updateOrCreate(['id' => $this->courseMaterialId], [
            'title' => $this->title,
            'description' => $this->description,
            'file_path' => $filePath,
            'uploaded_at' => now(),
            'course_id' => $this->course_id,
        ]);

        session()->flash('message',
            $this->courseMaterialId ? 'Material actualizado correctamente.' : 'Material creado correctamente.');

        $this->closeModal();
        $this->resetInputFields();
        $this->courseMaterials = CourseMaterial::where('course_id', $this->course_id)->get();
    }

    public function edit($id)
    {
        $courseMaterial = CourseMaterial::findOrFail($id);
        $this->courseMaterialId = $id;
        $this->title = $courseMaterial->title;
        $this->description = $courseMaterial->description;

        $this->openModal();
    }

    public function delete($id)
    {
        CourseMaterial::find($id)->delete();
        session()->flash('message', 'Material eliminado correctamente.');
        $this->courseMaterials = CourseMaterial::where('course_id', $this->course_id)->get();
    }
}
