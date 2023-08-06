<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RoleIndex extends Component
{
    public function render()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->paginate(10);
        return view('livewire.role-index', ['roles' => $roles]);
    }
    
    public function roleDelete($id){
        $role = Role::findOrFail($id);
        $role->delete();
        flash()->addInfo('Role deleted successfully');
        return redirect()->route('role.index');
    }
}
