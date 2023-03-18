<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $sliders = Slider::orderby('id', 'ASC')->paginate(5);
        return view('livewire.admin.slider.index', ['sliders'=> $sliders]);
    }
    
    public $slider_id;

    public function deleteSlider($slider_id)
    {
        $this->slider_id = $slider_id;
    }

    public function destroySlider()
    {
        $slider = Slider::find($this->slider_id);

        if(File::exists($slider->image)){
            File::delete($slider->image);
        }
        $slider->delete();
        session()->flash('success','Slider deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }
}
