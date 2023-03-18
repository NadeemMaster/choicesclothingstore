<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Active extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::where('status', 1)->orderby('name', 'ASC')->paginate(5);
        return view('livewire.admin.category.active', ['categories'=> $categories]);
    }
    
    public $category_id;

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('success','Category deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

}
