<?php

namespace App\Livewire;

use App\Imports\UsersImport;
use App\Models\Level;
use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class UserManager extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search;

    public $identification;

    public $last_name;

    public $first_name;

    public $level_id;

    public $role_id;

    public $gender;

    public $phone;

    public $mobile;

    public $email;

    public $password;

    public $editId;

    public $file;

    public $levels;

    public $roles;

    public function mount()
    {
        $this->levels = Level::all();
        $this->roles = Role::all();
    }

    public function render()
    {
        $users = User::where('identification', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->paginate(8);

        return view('livewire.user-manager', compact('users'))->layout('layouts.app');
    }

    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        Excel::import(new UsersImport, $this->file);
        session()->flash('message', 'Usuarios importados exitosamente.');
    }

    public function save()
    {
        $this->validate([
            'identification' => 'required|string|max:255|unique:users,identification,'.$this->editId,
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
            'role_id' => 'required|exists:roles,id',
            'gender' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'mobile' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->editId,
            'password' => 'sometimes|nullable|string|min:8',
        ]);

        if ($this->editId) {
            $user = User::findOrFail($this->editId);
            $user->update([
                'identification' => $this->identification,
                'last_name' => $this->last_name,
                'first_name' => $this->first_name,
                'level_id' => $this->level_id,
                'role_id' => $this->role_id,
                'gender' => $this->gender,
                'phone' => $this->phone,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'password' => $this->password ? bcrypt($this->password) : $user->password,
            ]);
        } else {
            User::create([
                'identification' => $this->identification,
                'last_name' => $this->last_name,
                'first_name' => $this->first_name,
                'level_id' => $this->level_id,
                'role_id' => $this->role_id,
                'gender' => $this->gender,
                'phone' => $this->phone,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'password' => bcrypt($this->password),
            ]);
        }

        $this->resetForm();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->editId = $id;
        $this->identification = $user->identification;
        $this->last_name = $user->last_name;
        $this->first_name = $user->first_name;
        $this->level_id = $user->level_id;
        $this->role_id = $user->role_id;
        $this->gender = $user->gender;
        $this->phone = $user->phone;
        $this->mobile = $user->mobile;
        $this->email = $user->email;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    private function resetForm()
    {
        $this->editId = null;
        $this->identification = '';
        $this->last_name = '';
        $this->first_name = '';
        $this->level_id = '';
        $this->role_id = '';
        $this->gender = '';
        $this->phone = '';
        $this->mobile = '';
        $this->email = '';
        $this->password = '';
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }
}
