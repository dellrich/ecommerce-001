<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{
    public function render()
    {
        $contactnous = Contact::paginate(12);
        return view('livewire.admin.admin-contact-component',['contactnous' => $contactnous]);
    }
}
