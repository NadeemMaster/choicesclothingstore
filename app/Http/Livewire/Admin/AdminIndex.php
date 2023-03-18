<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class AdminIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $admins = Admin::orderby('name', 'ASC')->paginate(5);
        return view('livewire.admin.admin-index', ['admins'=> $admins]);
    }
    
    public $admin_id;

    public function deleteAdmin($admin_id)
    {
        $this->admin_id = $admin_id;
    }

    public function destroyAdmin()
    {
        $admins = Admin::get();
        if ($admins->count()>1) {

            $admin = Admin::find($this->admin_id);
            if(File::exists($admin->image)){
                File::delete($admin->image);
            }
            $admin->delete();
            session()->flash('success','Admin deleted successfully!');
            $this->dispatchBrowserEvent('close-modal');

        } else {
            session()->flash('warning','There must be at least one admin');
            $this->dispatchBrowserEvent('close-modal');
        }

    }

}
