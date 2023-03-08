<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use App\Http\Requests\StoreProjectTypeRequest;
use App\Http\Requests\UpdateProjectTypeRequest;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectType $projectType)
    {
        if (!$projectType) {
            $projectType = new ProjectType();
        }

        $projectTypes = ProjectType::latest()->get();

        return view('project-type.index', compact('projectType', 'projectTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectTypeRequest $request)
    {
        ProjectType::create($request->validated());
        return redirect()
            ->route('project-types.index')
            ->with('success', 'Project Type Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectType $projectType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectType $projectType)
    {
        return $this->index($projectType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectTypeRequest  $request
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectTypeRequest $request, ProjectType $projectType)
    {
        $projectType->update($request->validated());
        return redirect()
            ->route('project-types.index')
            ->with('success', 'Project Type updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectType $projectType)
    {
        $projectType->delete();
        return redirect()
            ->route('project-types.index')
            ->with('success', 'Project Type deleted');
    }
}
