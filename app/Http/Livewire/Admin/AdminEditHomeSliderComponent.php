<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $top_titre;
    public $titre;
    public $sous_titre;
    public $offre;
    public $link;
    public $image;
    public $status;
    public $slide_id;
    public $newimage;

    public function mount($slide_id)
    {
        $slide = HomeSlider::find($slide_id);
        $this->top_titre = $slide->top_titre;
        $this->titre = $slide->titre;
        $this->sous_titre = $slide->sous_titre;
        $this->offre = $slide->offre;
        $this->link = $slide->link;
        $this->status = $slide->status;
        $this->image = $slide->image;
        $this->slide_id = $slide->id;
    }

    public function updateSilde()
    {
        $this->validate([
            // 'top_titre' => 'required',
            // 'titre' => 'required',
            // 'sous_titre' => 'required',
            // 'offre' => 'required',
            // 'link' => 'required',
            'status' => 'required'
        ]);


        $slide = HomeSlider::find($this->slide_id);
        $slide ->top_titre = $this->top_titre;
        $slide ->titre = $this->titre;
        $slide ->sous_titre = $this->sous_titre;
        $slide ->offre = $this->offre;
        $slide ->link = $this->link;
        $slide ->status = $this->status;
        if($this->newimage)
        {
            unlink('assets/imgs/slider/'.$slide->image);
             $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAS('slider',$imageName);
            $slide->image = $imageName;
        }


        $slide->save();
        if($slide)
        {
            toastr()->success("Slider modifié avec succes");
            return redirect()->route('admin.home.slider');

        }




    }

    public function render()
    {

        return view('livewire.admin.admin-edit-home-slider-component');
    }
}
