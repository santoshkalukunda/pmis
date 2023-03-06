<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Acheivement;
use App\Models\BudgetSource;
use App\Models\ExpenditureType;
use App\Models\Financial;
use App\Models\FiscalYear;
use App\Models\Office;
use App\Models\ProjectType;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Office $office)
    {
        $projects = $office
            ->project()
            ->latest()
            ->get();
        return view('project.index', compact('projects', 'office'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Office $office, Project $project = null)
    {
        if (!$project) {
            $project = new Project();
        }
        $projectTypes = ProjectType::get();
        $fiscalYears = FiscalYear::get();
        $budgetSources = BudgetSource::get();
        $expenditureTypes = ExpenditureType::get();
        return view('project.create', compact('project', 'projectTypes', 'fiscalYears', 'budgetSources', 'expenditureTypes', 'office'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request, Office $office)
    {
        $project = $office->project()->create($request->validated());
        return redirect()
            ->route('projects.show', [$office, $project])
            ->with('success', 'Project Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office, Project $project)
    {
        return view('project.show', compact('project', 'office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office, Project $project)
    {
        return $this->create($office, $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Office $office, Project $project)
    {
        $project->update($request->validated());
        return redirect()
            ->route('projects.show', [$office, $project])
            ->with('success', 'Project Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office, Project $project)
    {
        $project->delete();
        return redirect()
            ->back()
            ->with('success', 'Project Deleted');
    }

    public function office(Office $office = null)
    {
        if (!$office) {
            $office = new Office();
            $offices = Office::with(['childOffices'])
                ->where('parent_id', null)
                ->orderBy('name')
                ->get();
        } else {
            $offices = Office::where('parent_id', $office->id)
                ->orderBy('name')
                ->get();
        }

        return view('project.office', compact('offices', 'office'));
    }

    public function secondlevel(Office $office)
    {
        return $this->office($office);
    }

    public function financial(Office $office, Project $project, Financial $financial = null)
    {
        if (!$financial) {
            $financial = new Financial();
        }

        $financials = $project
            ->financial()
            ->latest()
            ->get();
        return view('project.financial', compact('project', 'office', 'financials', 'financial'));
    }

    public function financialEdit(Office $office, Project $project, Financial $financial)
    {
        return $this->financial($office, $project, $financial);
    }

    public function acheivement(Office $office, Project $project, Acheivement $acheivement = null)
    {
        if (!$acheivement) {
            $acheivement = new Acheivement();
        }

        $acheivements = $project
            ->acheivement()
            ->orderBy('status')
            ->get();
        return view('project.acheivement', compact('project', 'office', 'acheivements', 'acheivement'));
    }
    public function acheivementEdit(Office $office, Project $project, Acheivement $acheivement)
    {
        return $this->acheivement($office, $project, $acheivement);
    }
}
