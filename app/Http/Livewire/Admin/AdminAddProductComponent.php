<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValeur;
use toastr;
use Carbon\Carbon;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public  $name;
    public  $slug;
    public  $court_description;
    public  $description;
    public  $prix_normale;
    public  $prix_promo;
    public  $QR_code;
    public  $en_vedette='0';
    public  $quantite;

    public  $image ;
    public  $images ;
    public $status_stock ='enstock';
    public  $category_id;
    public $souscategory_id;

    public $attri;
    public $inputs=[];
    public $attribute_arr=[];
    public $attribute_values;



    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function add()
    {
        if(!in_array($this->attri,$this->attribute_arr))
        {
            array_push($this->inputs,$this->attri);
            array_push($this->attribute_arr,$this->attri);
        }
    }

    public function remove($attri)
    {
        unset($this->inputs[$attri]);
    }
    public function addProduct()
    {

        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'court_description'=>'required',
            'description'=>'required',
            'prix_normale'=>'required',
            //'prix_promo'=>'required',
            //'QR_code'=>'required',
            'en_vedette'=>'required',
            'quantite'=>'required',
           'image' =>'required',
            'status_stock'=>'required',
            'category_id'=>'required'
        ]);

        $product = new Product();

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->court_description = $this->court_description;
        $product->description = $this->description;
        $product->prix_normale = $this->prix_normale;
        $product->prix_promo = $this->prix_promo;
        $product->QR_code = $this->QR_code;
        $product->en_vedette = $this->en_vedette;
        $product->quantite = $this->quantite;
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAS('products',$imageName);

        if($this->images)
        {
            $imagesname ='';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key.'.'.$image->extension();
                $image->storeAS('products',$imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }

            $product->images = $imagesname;

        }

        $product->image = $imageName;
        $product->status_stock = $this->status_stock;
        $product->category_id = $this->category_id;
        if($this->souscategory_id)
        {
            $product->souscategory_id = $this->souscategory_id;
        }
        $product->save();

        foreach($this->attribute_values as $key=>$attribute_value)
        {
            $avalues =explode(",",$attribute_value);
            foreach($avalues as $avalue)
            {
                $attr_value = new AttributeValeur();
                $attr_value ->product_attribute_id = $key;
                $attr_value->value = $avalue;
                $attr_value->product_id = $product->id;
                $attr_value->save();
            }
        }


        $this->resetes();
        toastr()->success("Produit enregistré avec succes");
    }
    public function resetes()
    {

        $this->name= '';
        $this->slug= '';
        $this->court_description= '';
        $this->description= '';
        $this->prix_normale= '';
        $this->prix_promo= '';
        $this->QR_code= '';
        $this->en_vedette= '';
        $this->quantite= '';
        $this->image= null;
        $this->status_stock= '';
        $this->category_id= '';


    }

    public function changeSouscategory()
    {
        $this->souscategory_id =0;
    }


    public function render()
    {

        $categories = Category::orderBy('name', 'ASC')->get();
        $scategories =Subcategory::where('category_id', $this->category_id)->get();
        $pattributes = ProductAttribute::all();
        return view('livewire.admin.admin-add-product-component',['categories' => $categories,
        'scategories' => $scategories,
        'pattributes' => $pattributes]);
    }
}
