<?php

namespace App\Http\Controllers;

use App\Models\Estimate;
use App\Http\Requests\StoreEstimateRequest;
use App\Http\Requests\UpdateEstimateRequest;
use App\Models\Project;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreEstimateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstimateRequest $request, Project $project)
    {
        $project->estimate()->create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'Estimate item added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function show(Estimate $estimate)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function edit(Estimate $estimate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstimateRequest  $request
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstimateRequest $request, Estimate $estimate)
    {
        $office = $estimate->project->office;
        $project = $estimate->project;

        $estimate->update($request->validated());
        return redirect()
            ->route('projects.estimate', [$office, $project])
            ->with('success', 'Estimate Item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimate  $estimate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimate $estimate)
    {
        $estimate->delete();
        return redirect()->back()->with('success',"Estimate Item Deleted");
    }
}
