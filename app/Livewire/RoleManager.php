<?php

namespace App\Livewire;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class RoleManager extends Component
{
    use WithPagination;

    public $name;

    public $key;

    public $editId;

    public function render()
    {
        $roles = Role::paginate(8);

        return view('livewire.role-manager', compact('roles'))->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
        ]);

        if ($this->editId) {
            $this->updateRole();
        } else {
            $this->createRole();
        }

        $this->resetForm();
    }

    private function createRole()
    {
        Role::create([
            'name' => $this->name,
            'key' => $this->key,
            'guard_name' => 'web',
        ]);
    }

    private function updateRole()
    {
        $role = Role::findOrFail($this->editId);
        $role->update([
            'name' => $this->name,
            'key' => $this->key,
        ]);
    }

    public function edit($id)
    {
        $this->editId = $id;
        $role = Role::findOrFail($id);
        $this->name = $role->name;
        $this->key = $role->key;
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        $this->resetPage();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = '';
        $this->key = '';
        $this->editId = null;
    }
}
