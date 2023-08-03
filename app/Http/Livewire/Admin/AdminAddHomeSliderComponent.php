<?php

namespace App\Http\Livewire\Admin;

use toastr;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $top_titre;
    public $titre;
    public $sous_titre;
    public $offre;
    public $link;
    public $image;
    public $status = 1;

    public function addSilde()
    {
        $this->validate([
            //'top_titre' => 'required',
            // 'titre' => 'required',
            // 'sous_titre' => 'required',
            // 'offre' => 'required',
            // 'link' => 'required',
            'image' => 'required',
            'status' => 'required'
        ]);


        $slide = new HomeSlider();
        $slide ->top_titre = $this->top_titre;
        $slide ->titre = $this->titre;
        $slide ->sous_titre = $this->sous_titre;
        $slide ->offre = $this->offre;
        $slide ->link = $this->link;
        $slide ->status = $this->status;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAS('slider',$imageName);
        $slide->image = $imageName;
        $slide->save();
        $this->resetes();
        toastr()->success("Slider enregistré avec succes");



    }
    public function resetes()
    {

        $this->top_titre= '';
        $this->titre= '';
        $this->sous_titre= '';
        $this->offre= '';
        $this->link= '';
        $this->image= '';
        $this->status= '';

    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component');
    }
}
