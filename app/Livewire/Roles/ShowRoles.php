<?php

namespace App\Livewire\Roles;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

#[Title('Roles')]
class ShowRoles extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.roles.show-roles', [
            'roles' => Role::withCount('users')->paginate(10)
        ]);
    }

    public function edit($id)
    {
        return redirect()->route('roles.edit', $id);
    }

    public function confirmDelete($id)
    {
        // Implementeer delete functionaliteit
    }
}
