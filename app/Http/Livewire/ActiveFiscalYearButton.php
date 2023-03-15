<?php

namespace App\Http\Livewire;

use App\Models\FiscalYear;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ActiveFiscalYearButton extends Component
{
    public $fiscal_year_id;
    protected $listeners = ['fiscalYearChanged'];
    
    public function mount(){
        $this->fiscal_year_id= Session::get('active_fiscal_year');
    }


    public function fiscalYearChanged()
    {
        $this->fiscal_year_id= Session::get('active_fiscal_year');
    }

    public function setFiscalYear(){
        Session::put('active_fiscal_year',  $this->fiscal_year_id);
        $this->emit('fiscalYearChanged');
    }
    public function render()
    {
        $fiscalYears = FiscalYear::get();
        return view('livewire.active-fiscal-year-button',compact('fiscalYears'));
    }
}
