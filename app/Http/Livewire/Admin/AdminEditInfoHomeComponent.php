<?php

namespace App\Http\Livewire\Admin;

use toastr;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\InfoEnteteHome;

class AdminEditInfoHomeComponent extends Component
{

    use WithFileUploads;
    public $flash_info1;
    public $flash_info2;
    public $flash_info3;
    public $link;
    public $telephone;
    public $link_facebook;
    public $twitter;
    public $link_instagram;
    public $info_id;
    public $logo_image;
    public $newimage;
    public   $address;



    public function mount($info_id)
    {
        $info = InfoEnteteHome::find($info_id);
        $this->flash_info1 = $info->flash_info1;
        $this->flash_info2 = $info->flash_info2;
        $this->flash_info3 = $info->flash_info3;
        $this->telephone = $info->telephone;
        $this->link = $info->link;
        $this->link_facebook = $info->link_facebook;
        $this->twitter = $info->twitter;
        $this->info_id = $info->id;
        $this->address= $info->address;
        $this->logo_image = $info->logo_image;
    }

    public function updateInfo()
    {
        $this->validate([
            'flash_info1'=>'required',
            'flash_info2'=>'required',
           'flash_info3'=>'required',
           // 'link'=>'required',

           // 'link_facebook'=>'required',
            'address'=>'required',
            'link'=>'required',
            'telephone'=>'required',
            'logo_image'=>'required'
        ]);


        $info = InfoEnteteHome::find($this->info_id);
        $info->flash_info1= $this->flash_info1;
        $info->flash_info2= $this->flash_info2;
        $info->flash_info3= $this->flash_info3;
        $info->link= $this->link;
        $info->telephone= $this->telephone;
        $info->link_facebook= $this->link_facebook;
        $info->twitter= $this->twitter;
        $info->address= $this->address;
        $info->link_instagram= $this->link_instagram;
        if($this->newimage)
        {
            unlink('assets/imgs/logo/'.$info->logo_image);
                $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
                $this->newimage->storeAS('logo',$imageName);
                $info->logo_image = $imageName;
        }
        $info->save();
        if($info)
        {
            toastr()->success("information modifié avec succes");
            return redirect()->route('admin.info_home');

        }

       // return redirect()->route('admin.info_home');



    }

    public function render()
    {
        return view('livewire.admin.admin-edit-info-home-component');
    }
}
