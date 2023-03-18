<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;

class Create extends Component
{
    public $categories, $subcategories, $categoryInput='0';

    public function render()
    {
        $this->categories = Category::where('status', '1')->get();

        $this->subcategories = SubCategory::where('status', '1')
        ->when($this->categoryInput, function($subcat){
            $subcat->where('category_id',$this->categoryInput);
        })->get();
        
        return view('livewire.admin.product.create', ['categories' => $this->categories , 'subcategories' => $this->subcategories]);
    }
}
