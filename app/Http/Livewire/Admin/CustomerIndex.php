<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class CustomerIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $customers = Customer::orderby('name', 'ASC')->paginate(5);
        return view('livewire.admin.customer-index', ['customers'=> $customers]);
    }

    public $customer_id;

    public function deleteCustomer($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    public function destroyCustomer()
    {
        $customer = Customer::find($this->customer_id);
        if(File::exists($customer->image)){
            File::delete($customer->image);
        }
        $customer->delete();
        session()->flash('success','Customer deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }

}
