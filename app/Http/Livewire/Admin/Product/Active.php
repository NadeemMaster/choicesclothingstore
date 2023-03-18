<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Active extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $productslow = Product::where([['quantity', '<', '20'],['status', 1]])->get();
        $products = Product::where('status', 1)->orderby('id', 'DESC')->paginate(5);
        return view('livewire.admin.product.active', ['products'=> $products, 'productslow'=>$productslow]);
    }
    
    public $product_id;

    public function deleteProduct($product_id)
    {
        $this->product_id = $product_id;
    }

    public function destroyProduct()
    {
        $product = Product::find($this->product_id);
        foreach ($product->productImages as $image){
             if(File::exists($image->image)){
                File::delete($image->image);
            }
        }
        $product->delete();
        session()->flash('success','Product with images deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }
}
