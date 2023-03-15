<?php

namespace App\Http\Livewire;

use App\Models\ActiveFiscalYear;
use App\Models\FiscalYear;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ActiveFisacalYearSet extends Component
{
    public $fiscal_year_id;
    public $activeFiscalYear;

    public function mount()
    {
        $this->activeFiscalYear = ActiveFiscalYear::first();
        $this->fiscal_year_id = $this->activeFiscalYear->fiscal_year_id;
    }
    public function fiscalYearsUpdate()
    {
        $this->activeFiscalYear->update(['fiscal_year_id' => $this->fiscal_year_id]);
        Session::put('active_fiscal_year',  $this->fiscal_year_id);
        $this->emit('fiscalYearChanged');
    }

    public function render()
    {
        $fiscalYears = FiscalYear::orderBy('fiscal_year', 'desc')->get();
        return view('livewire.active-fisacal-year-set', compact('fiscalYears'));
    }
}
