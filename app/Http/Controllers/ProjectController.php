<?php

namespace App\Http\Controllers;

use App\Exports\ProjectExport;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Acheivement;
use App\Models\Budget;
use App\Models\BudgetSource;
use App\Models\Expenditure;
use App\Models\ExpenditureType;
use App\Models\Financial;
use App\Models\FiscalYear;
use App\Models\Office;
use App\Models\ProjectSource;
use App\Models\ProjectType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('project.create', compact('project', 'projectTypes', 'fiscalYears', 'office'));
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

    public function photo(Office $office, Project $project)
    {
        $photos = $project
            ->photo()
            ->latest()
            ->get();
        return view('project.photo', compact('project', 'office', 'photos'));
    }

    public function budget(Office $office, Project $project, Budget $budget = null)
    {
        if (!$budget) {
            $budget = new Budget();
        }

        $budgets = $project
            ->budget()
            ->latest()
            ->get();
        $fiscalYears = FiscalYear::get();
        $budgetSources = BudgetSource::get();
        return view('project.budget', compact('project', 'office', 'budgets', 'budget', 'budgetSources', 'fiscalYears'));
    }

    public function budgetEdit(Office $office, Project $project, Budget $budget)
    {
        return $this->budget($office, $project, $budget);
    }

    public function expenditure(Office $office, Project $project, Expenditure $expenditure = null)
    {
        if (!$expenditure) {
            $expenditure = new Expenditure();
        }

        $expenditures = $project
            ->expenditure()
            ->orderBy('fiscal_year_id')
            ->latest()
            ->get();
        $fiscalYears = FiscalYear::get();
        $expenditureTypes = ExpenditureType::get();
        return view('project.expenditure', compact('project', 'office', 'expenditureTypes', 'expenditures', 'expenditure', 'fiscalYears'));
    }

    public function expenditureEdit(Office $office, Project $project, Expenditure $expenditure)
    {
        return $this->expenditure($office, $project, $expenditure);
    }

    public function search(Office $office, Request $request)
    {
        $projects = new Project();

        if ($request->has('district')) {
            if ($request->district != null) {
                $projects = $projects->where('district', $request->district);
            }
        }
        if ($request->has('municipality')) {
            if ($request->municipality != null) {
                $projects = $projects->where('municipality', $request->municipality);
            }
        }
        if ($request->has('fiscal_year_id')) {
            if ($request->fiscal_year_id != null) {
                $projects = $projects->where('fiscal_year_id', $request->fiscal_year_id);
            }
        }
        if ($request->has('project_type_id')) {
            if ($request->project_type_id != null) {
                $projects = $projects->where('project_type_id', $request->project_type_id);
            }
        }
        if ($request->has('agreement')) {
            if ($request->agreement == true) {
                $projects = $projects->whereNotNull('agreement_date');
            }else{
                $projects = $projects->where('agreement_date', null);
            }
        }
        if ($request->has('status')) {
            if ($request->status != null) {
                $projects = $projects->where('status', $request->status);
            }
        }
        if ($request->has('name')) {
            if ($request->name != null) {
                $projects = $projects->where('name', 'LIKE', "$request->name%");
            }
        }
        $projects = $projects
            ->where('office_id', $office->id)
            ->latest()
            ->get();
        return view('project.index', compact('projects', 'office'));
    }
    public function excel(Office $office, Request $request)
    {
        return Excel::download(new ProjectExport($office, $request), 'Project-report.xlsx');
    }
}
