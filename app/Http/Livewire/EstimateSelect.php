<?php

namespace App\Http\Livewire;

use App\Models\Estimate;
use App\Models\Expense;
use App\Models\Project;
use Livewire\Component;

class EstimateSelect extends Component
{
    public $estimates;
    public $project;
    public $estimate_id;
    public $unit;
    public $rate;
    public $expense;

    public function mount(Project $project, Expense $expense = null)
    {
        $this->expense = $expense;
        $this->project = $project;
        $this->estimates = $this->project->estimate()->get();
        $this->estimate_id = $expense->estimate_id;
        if ($this->estimate_id) {
           $this->setEstimate();
        }
    }
    public function setEstimate()
    {
        $estimate = Estimate::findOrFail($this->estimate_id);
        $this->unit = $estimate->unit;
        $this->rate = $estimate->rate;
    }
    public function render()
    {
        return view('livewire.estimate-select');
    }
}
