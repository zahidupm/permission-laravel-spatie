<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;

class LeadCreate extends Component
{
    public $name;
    public $email;
    public $phone;

    public function render()
    {
        return view('livewire.lead-create');
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ];

    public function formSubmit(){
        $this->validate();

        Lead::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ]);
        flash()->addSuccess('Lead created successfully');
        return redirect()->route('lead.index');
    }
}
