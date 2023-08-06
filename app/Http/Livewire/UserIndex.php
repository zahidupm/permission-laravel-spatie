<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.user-index', ['users' => $users]);
    }
}
