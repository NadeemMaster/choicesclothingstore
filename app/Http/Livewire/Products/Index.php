<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $category;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $products = Product::where([['status', '1'], ['category_id', $this-> category ->id],])->paginate(15);
        return view('livewire.products.index', ['category' => $this->category , 'products' => $products]);
    }
}
