<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{

    public $name;
    public $email;
    public $phone;
    public $comment;
    public $subject;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'email' =>'required|email',
            'phone' =>'required|numeric',
            'comment' =>'required',
            'subject'=>'required'
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'name'=>'required',
            'email' =>'required|email',
            'phone' =>'required|numeric',
            'comment' =>'required',
            'subject'=>'required'
        ]);
        $contact = new Contact();
        $contact ->name =$this->name;
        $contact ->email =$this->email;
        $contact ->phone =$this->phone;
        $contact ->comment =$this->comment;
        $contact ->subject =$this->subject;
        $contact ->save();
        if  ($contact)
        {
            toastr()->success("Votre message a bien été envoyé avec succese","Merci !!!");
            return redirect()->route('contact');
        }
    }
    public function render()
    {
        return view('livewire.contact-component');
    }
}
