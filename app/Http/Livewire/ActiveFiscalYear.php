<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ActiveFiscalYear extends Component
{
    public $active_fiscal_year;
    protected $listeners = ['fiscalYearChanged'];

    public function fiscalYearChanged(){
       
    }
    
    public function render()
    {
        return view('livewire.active-fiscal-year');
    }
}
