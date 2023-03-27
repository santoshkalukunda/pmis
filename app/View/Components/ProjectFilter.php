<?php

namespace App\View\Components;

use App\Models\FiscalYear;
use App\Models\Office;
use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\View\Component;

class ProjectFilter extends Component
{
    public $project;
    public $office;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Office $office, Project $project = null)
    {
        $this->office = $office;
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $projectTypes = ProjectType::get();
        $fiscalYears = FiscalYear::get();
        return view('components.project-filter', compact('projectTypes','fiscalYears'));
    }
}
