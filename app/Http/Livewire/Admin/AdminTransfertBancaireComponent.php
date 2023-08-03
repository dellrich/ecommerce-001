<?php

namespace App\Http\Livewire\Admin;

use App\Models\TransfertBancaire;
use Livewire\Component;

class AdminTransfertBancaireComponent extends Component
{
    public $transfert_id;
    public function deleteInfoTransfert()
    {
        $transfertbnk = TransfertBancaire::find($this->transfert_id);
        $transfertbnk->delete();
        toastr()->success("Information bancaire supprimée avec succes");

    }
    public function render()
    {
        $transfertbnks =TransfertBancaire::orderBy('created_at','DESC')->get();

        return view('livewire.admin.admin-transfert-bancaire-component',['transfertbnks'=>$transfertbnks]);
    }
}
