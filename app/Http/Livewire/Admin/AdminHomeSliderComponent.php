<?php

namespace App\Http\Livewire\Admin;

use toastr;
use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component
{

    public $slide_id;

    public function deleteSlide()
    {
        $slide = HomeSlider::find($this->slide_id);
        unlink('assets/imgs/slider/'.$slide->image);
        $slide->delete();
        toastr()->success("Message","Slide supprimé avec succes!!");

    }

    public function render()
    {
        $slides= HomeSlider::orderBy('created_at','DESC')->get();
        return view('livewire.admin.admin-home-slider-component',['slides'=>$slides]);
    }
}
