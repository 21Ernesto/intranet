<?php

namespace App\Livewire;

use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;

class LevelManager extends Component
{
    use WithPagination;

    public $name;

    public $search;

    public $editId;

    public function render()
    {
        $levels = Level::where('name', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.level-manager', compact('levels'))->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
        ]);

        if ($this->editId) {
            $this->updateCategory();
        } else {
            $this->createCategory();
        }

        $this->resetForm();
    }

    private function createCategory()
    {
        Level::create([
            'name' => $this->name,
        ]);
    }

    private function updateCategory()
    {
        $level = Level::findOrFail($this->editId);
        $level->update([
            'name' => $this->name,
        ]);
    }

    public function edit($id)
    {
        $this->editId = $id;
        $level = Level::findOrFail($id);
        $this->name = $level->name;
    }

    public function delete($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();
        $this->resetPage();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->editId = null;
    }
}
