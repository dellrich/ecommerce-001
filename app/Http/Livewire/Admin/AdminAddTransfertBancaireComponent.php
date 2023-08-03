<?php

namespace App\Http\Livewire\Admin;

use App\Models\TransfertBancaire;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddTransfertBancaireComponent extends Component
{

    use WithFileUploads;
    public $swift;
    public $RIB;
    public $IBAN;
    public $nombanque;
    public $Adresse;
   


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'IBAN'=>'required',
            'nombanque'=>'required'
           

        ]);
    }

    public function addBank()
    {
        $this->validate([

          
            'IBAN'=>'required',
            'nombanque'=>'required'
            
        ]);

        $transfertbnk = new TransfertBancaire();


        $transfertbnk->swift= $this->swift;
        $transfertbnk->RIB= $this->RIB;
        $transfertbnk->IBAN= $this->IBAN;
        $transfertbnk->nombanque= $this->nombanque;
        $transfertbnk->Adresse= $this->Adresse;


        $transfertbnk->save();
        if($transfertbnk)
        {    
             toastr()->success("Information bancaire ajouté avec succes");
            return redirect()->route('admin.transfert_bank');
        }


    }
    
    public function render()
    {
        return view('livewire.admin.admin-add-transfert-bancaire-component');
    }
}
