<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class Index extends Component
{
    public function render()
    {
        $categories = Category::where('status', '1')->orderby('name', 'ASC')->get();
        return view('livewire.categories.index', ['categories'=> $categories]);
    }
}
