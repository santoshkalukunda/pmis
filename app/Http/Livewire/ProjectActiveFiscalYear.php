<?php

namespace App\Http\Livewire;

use App\Models\FiscalYear;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProjectActiveFiscalYear extends Component
{
    public $activeFiscalYear;
    protected $listeners = ['fiscalYearChanged'];
    public $fiscalYear;

    public function fiscalYearChanged()
    {
    }

    public function mount($fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
    }
    public function render()
    {
        $fiscalYears = FiscalYear::get();
        if ($this->fiscalYear) {
            $this->activeFiscalYear = $this->fiscalYear;
        }else{
            $this->activeFiscalYear = Session::get('active_fiscal_year');
        }
        return view('livewire.project-active-fiscal-year', compact('fiscalYears'));
    }
}
