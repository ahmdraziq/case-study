<?php

namespace App\Http\Livewire;

use App\Models\UserRole;
use Livewire\Component;
use Livewire\WithPagination;

class RoleList extends Component
{
    use WithPagination;
    public $role_name;

    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'role_name' => 'required|max:20',
    ];

    public function render()
    {
        return view('livewire.role-list', [
            'roles' => UserRole::paginate(10),
        ]);
    }

    public function addRole()
    {
        $validatedData = $this->validate();

        UserRole::create($validatedData);

        $this->dispatchBrowserEvent('role-added');
        return redirect()->to('/home');
    }
}
