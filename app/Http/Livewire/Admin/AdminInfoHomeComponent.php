<?php

namespace App\Http\Livewire\Admin;

use toastr;
use Livewire\Component;
use App\Models\InfoEnteteHome;

class AdminInfoHomeComponent extends Component
{
    public $info_id;
    public function deleteInfo()
    {
        $info = InfoEnteteHome::find($this->info_id);
        $info->delete();
        toastr()->success("Information supprimée avec succes");

    }
    public function render()
    {
        $infos =InfoEnteteHome::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-info-home-component',['infos' => $infos]);
    }
}

