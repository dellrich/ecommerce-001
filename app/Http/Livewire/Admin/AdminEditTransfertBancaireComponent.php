<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\TransfertBancaire;

class AdminEditTransfertBancaireComponent extends Component
{
    use WithFileUploads;
    public $swift;
    public $RIB;
    public $IBAN;
    public $nombanque;
    public $Adresse;
    public $transfert_id;



    public function mount($transfert_id)
    {
        $transfertbnk = TransfertBancaire::find($transfert_id);
        $this->swift = $transfertbnk->swift;
        $this->RIB = $transfertbnk->RIB;
        $this->IBAN = $transfertbnk->IBAN;
        $this->nombanque = $transfertbnk->nombanque;
        $this->Adresse = $transfertbnk->Adresse;
        
        $this->transfert_id = $transfertbnk->id;
       
    }

    public function updatetransfertbnk()
    {
        $this->validate([
            'IBAN'=>'required',
            'nombanque'=>'required'
           
        ]);


        $transfertbnk = TransfertBancaire::find($this->transfert_id);
        $transfertbnk->swift= $this->swift;
        $transfertbnk->RIB= $this->RIB;
        $transfertbnk->IBAN= $this->IBAN;
        $transfertbnk->nombanque= $this->nombanque;
        $transfertbnk->Adresse= $this->Adresse;
       
        $transfertbnk->save();
        if($transfertbnk)
        {
            toastr()->success("information bancaire modifié avec succes");
            return redirect()->route('admin.info_home');

        }

       // return redirect()->route('admin.info_home');



    }
    public function render()
    {
        return view('livewire.admin.admin-edit-transfert-bancaire-component');
    }
}
