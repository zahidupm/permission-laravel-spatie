<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use Livewire\Component;

class LeadEdit extends Component
{
    public $name;
    public $email;
    public $phone;
    public $lead_id;

    public function mount(){
        $lead = Lead::findOrFail($this->lead_id);
        $this->lead_id = $lead->id;
        $this->name = $lead->name;
        $this->email = $lead->email;
        $this->phone = $lead->phone;
    }

    public function render()
    {
        return view('livewire.lead-edit');
    }

    protected $rules = [
        'email' => 'email',
        'phone' => 'required',
    ];

    public function formSubmit(){
        $lead = Lead::findOrFail($this->lead_id);

        $this->validate();

        $lead->update([
           'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone
        ]);

        flash()->addUpdated('Lead updated successfully');
        return redirect()->route('lead.index');
    }
}
