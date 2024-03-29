<?php

namespace App\Http\Livewire;

use App\Models\Municipality;
use App\Models\Project;
use Livewire\Component;

class ProjectMunicipality extends Component
{
    public $districtName;
    public $municipality;

    public function mount(Project $project)
    {
        $this->districtName = $project->district;
        $this->municipality = $project->municipality;
    }

    public function render()
    {
        $municipalities = Municipality::get();
        return view('livewire.project-municipality', compact('municipalities'));
    }
}
