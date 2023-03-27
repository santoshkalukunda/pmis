<?php

namespace App\Http\Livewire;

use App\Models\Indicator;
use Livewire\Component;

class ProjectIndicatorStatus extends Component
{
    public $indicator;
    public $change;

    public function mount(Indicator $indicator)
    {
        $this->indicator = $indicator;
        $this->change = $this->indicator->status;
    }
    public function updatedChange()
    {
        if ($this->indicator->status == true) {
            $this->indicator->update([
                'status' => false,
            ]);
        } else {
            $this->indicator->update([
                'status' => true,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.project-indicator-status');
    }
}
