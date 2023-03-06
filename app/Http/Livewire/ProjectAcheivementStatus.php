<?php

namespace App\Http\Livewire;

use App\Models\Acheivement;
use Livewire\Component;

class ProjectAcheivementStatus extends Component
{
    public $acheivement;
    public $change;

    public function mount(Acheivement $acheivement)
    {
        $this->acheivement = $acheivement;
        $this->change = $this->acheivement->status;
    }
    public function updatedChange()
    {
        if ($this->acheivement->status == true) {
            $this->acheivement->update([
                'status' => false,
            ]);
        } else {
            $this->acheivement->update([
                'status' => true,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.project-acheivement-status');
    }
}
