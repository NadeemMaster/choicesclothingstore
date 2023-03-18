<?php

namespace App\Http\Livewire\Admin\SubCategory;

use Livewire\Component;
use App\Models\SubCategory;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Active extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $subcategories = SubCategory::where('status', 1)->orderby('id', 'DESC')->paginate(10);
        return view('livewire.admin.sub-category.active', ['subcategories'=> $subcategories]);
    }
    
    public $subcategory_id;

    public function deleteSubCategory($subcategory_id)
    {
        $this->subcategory_id = $subcategory_id;
    }

    public function destroySubCategory()
    {
        $subcategory = SubCategory::find($this->subcategory_id);
        $path = 'uploads/subcategory/'.$subcategory->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $subcategory->delete();
        session()->flash('success','Sub Category deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }
}
