<?php

namespace App\Http\Livewire\Admin\Contactusmsgs;

use App\Models\Contactus;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $messages = Contactus::orderby('id', 'DESC')->paginate(10);
        return view('livewire.admin.contactusmsgs.index', ['messages'=> $messages]);
    }
}
