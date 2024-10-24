<?php

namespace App\Livewire;

use App\Models\Justification;
use Livewire\Component;

class JustificationComponent extends Component
{
    public $justificationId;

    public $file;

    public $justification;

    public $user_id;

    public $isOpen = false;

    protected $rules = [
        'file' => 'required|string',
        'justification' => 'boolean',
    ];

    public function render()
    {
        $justifications = Justification::with('user')->get();

        return view('livewire.justification-component', compact('justifications'))->layout('layouts.app');
    }

    public function edit($id)
    {
        $justification = Justification::findOrFail($id);
        $this->justificationId = $id;
        $this->file = $justification->file;
        $this->justification = $justification->justification;
        $this->user_id = $justification->user_id;
        $this->isOpen = true;
    }

    public function updateJustification()
    {
        $this->validate();

        $justification = Justification::find($this->justificationId);
        $justification->justification = ! $justification->justification; // Invertir el estado actual
        $justification->save();

        session()->flash('message', 'Estado de justificación actualizado correctamente.');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->isOpen = false;
    }
}
