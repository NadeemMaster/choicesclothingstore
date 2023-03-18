<?php

namespace App\Http\Livewire\Admin\Product;


use Livewire\Component;
use App\Models\SubCategory;

class Edit extends Component
{
    public $product, $category, $subcategories;

    public function mount($product)
    {
        $this->product = $product;
     }

    public function render()
    {

        $this->category = $this->product->category_id;

        $this->subcategories = SubCategory::where('status', '1')->when($this->category, function($subcat){
            $subcat->where('category_id',$this->category);
        })->get();

        return view('livewire.admin.product.edit', ['product' => $this->product, 'subcategories' => $this->subcategories]);
    }
}
