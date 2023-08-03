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

class AdminEditProductComponent extends Component
{

    use WithFileUploads;
    public $product_id;
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
    public $newimage;
    public $newimages;
    public $souscategory_id;


    public $attri;
    public $inputs=[];
    public $attribute_arr=[];
    public $attribute_values;


    public function mount($product_id)
    {
        $product =Product::find($product_id);
        $this->product_id = $product->id;
        $this->name= $product->name;
        $this->slug= $product->slug;
        $this->court_description= $product->court_description;
        $this->description= $product->description;
        $this->prix_normale= $product->prix_normale;
        $this->prix_promo= $product->prix_promo;
        $this->QR_code= $product->QR_code;
        $this->en_vedette= $product->en_vedette;
        $this->quantite= $product->quantite;
        $this->image= $product->image ;
        $this->images= explode(',',$product->images);
        $this->status_stock= $product->status_stock;
        $this->souscategory_id = $product->souscategory_id;
        $this->category_id= $product->category_id;
        $this->inputs =$product->attributeValues->where('product_id',$product->id)->unique('product_attribute_id')->pluck('product_attribute_id');
        $this->attribute_arr= $product->attributeValues->where('product_id',$product->id)->unique('product_attribute_id')->pluck('product_attribute_id');

        foreach($this->attribute_arr as $a_arr)
        {
            $allAttributevaleur = AttributeValeur::where('product_id',$product->id)->where('product_attribute_id',$a_arr)->get()->pluck('value');
            $valueString ='';
            foreach($allAttributevaleur as $value)
            {
                $valueString= $valueString . $value . ',';
            }
            $this->attribute_values[$a_arr] = rtrim($valueString,",");
        }

    }


    public function add()
    {
        if(!$this->attribute_arr->contains($this->attri))
        {
           $this->inputs->push($this->attri);
         $this->attribute_arr->push($this->attri);
        }
    }

    public function remove($attri)
    {
        unset($this->inputs[$attri]);
    }


    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct()
    {

        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'court_description'=>'required',
            'description'=>'required',
            'prix_normale'=>'required',


            'en_vedette'=>'required',
            'quantite'=>'required',
           'image' =>'required',
            'status_stock'=>'required',
            'category_id'=>'required'
        ]);

        $product =  Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->court_description = $this->court_description;
        $product->description = $this->description;
        $product->prix_normale = $this->prix_normale;
        $product->prix_promo = $this->prix_promo;
        $product->QR_code = $this->QR_code;
        $product->en_vedette = $this->en_vedette;
        $product->quantite = $this->quantite;
        if($this->newimage)
        {
            unlink('assets/imgs/products/'.$product->image);
             $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAS('products',$imageName);
            $product->image = $imageName;
        }

        if($this->newimages)
        {
            if($product->images)
            {
                $images = explode(',',$product->images);
                foreach($images as $image)
                {
                    if($image)
                    {
                        unlink('assets/images/products'.'/'.$image);
                    }
                }
            }

            $imagesname='';
            foreach($this->newimages as $key => $image)
            {
                $imgName = Carbon::now()->timestamp. $key . '.' . $image->extension();
                $image->storeAs('products',$imgName);
                $imagesnames = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesnames;
        }

        $product->status_stock = $this->status_stock;
        $product->category_id = $this->category_id;
        if($this->souscategory_id)
        {
            $product->souscategory_id = $this->souscategory_id;
        }
        $product->save();

        AttributeValeur::where('product_id', $product->id)->delete();
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



        if($product)
        {
            toastr()->success("Modification du produit éffectué avec succes");
            return redirect()->route('admin.products');

        }

    }

    public function changeSouscategory()
    {
        $this->souscategory_id =0;
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $scategories =Subcategory::where('category_id', $this->category_id)->get();
        $pattributes =ProductAttribute::all();

        return view('livewire.admin.admin-edit-product-component',['categories' => $categories,
        'scategories'=>$scategories,
        'pattributes'=>$pattributes]);
    }
}
