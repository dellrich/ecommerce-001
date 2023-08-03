<?php

namespace App\Http\Livewire\Admin;

use toastr;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\InfoEnteteHome;

class AdminAddInfoHomeComponent extends Component
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
    public $logo_image;
    public $address;


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'flash_info1'=>'required',
            'flash_info2'=>'required',
            'flash_info3'=>'required',
            'link'=>'required',
            'telephone'=>'required',
            'link_facebook'=>'required',
            'twitter'=>'required',
            'link_instagram'=>'required',
            'telephone'=>'required',
            'address'=>'required',
            'logo_image'=>'required'

        ]);
    }

    public function addInformation()
    {
        $this->validate([

            'flash_info1'=>'required',
            'flash_info2'=>'required',
           'flash_info3'=>'required',
           // 'link'=>'required',

           // 'link_facebook'=>'required',
          //  'twitter'=>'required',
            'link'=>'required',
            'telephone'=>'required',
            'logo_image'=>'required'
        ]);

        $info = new InfoEnteteHome();


        $info->flash_info1= $this->flash_info1;
        $info->flash_info2= $this->flash_info2;
        $info->flash_info3= $this->flash_info3;
        $info->link= $this->link;
        $info->address= $this->address;

        $info->telephone= $this->telephone;
        $info->link_facebook= $this->link_facebook;
        $info->twitter= $this->twitter;
        $info->link_instagram= $this->link_instagram;
        $imageName = Carbon::now()->timestamp.'.'.$this->logo_image->extension();
        $this->logo_image->storeAS('logo',$imageName);
        $info->logo_image = $imageName;

        $info->save();
        toastr()->success("Information ajouté avec succes");


    }

    public function render()
    {
        return view('livewire.admin.admin-add-info-home-component');
    }
}
// flash_info1
// flash_info2
// flash_info3
// link
// telephone
// link_facebook
// twitter
// link_instagram
// logo_image
