<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryManager extends Component
{
    use WithPagination;

    public $name;

    public $description;

    public $search;

    public $editId;

    public function render()
    {
        $categories = Category::where('name', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.category-manager', compact('categories'))->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'string',
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
        Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);
    }

    private function updateCategory()
    {
        $category = Category::findOrFail($this->editId);
        $category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);
    }

    public function edit($id)
    {
        $this->editId = $id;
        $category = Category::findOrFail($id);
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $this->resetPage();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->description = '';
        $this->editId = null;
    }
}
