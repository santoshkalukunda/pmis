<?php

namespace App\Http\Livewire;

use App\Models\Municipality;
use Livewire\Component;

class ProjectMunicipality extends Component
{
    public $districtName;

    public function render()
    {
        $municipalities = Municipality::get();
        return view('livewire.project-municipality',compact('municipalities'));
    }
}
