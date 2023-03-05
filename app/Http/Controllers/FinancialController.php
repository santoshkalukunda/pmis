<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Http\Requests\StoreFinancialRequest;
use App\Http\Requests\UpdateFinancialRequest;
use App\Models\Project;

class FinancialController extends Controller
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
     * @param  \App\Http\Requests\StoreFinancialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinancialRequest $request, Project $project)
    {
        $project->financial()->create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'Financial transaction created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show(Financial $financial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(Financial $financial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinancialRequest  $request
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinancialRequest $request, Financial $financial)
    {
        $office = $financial->project->office;
        $project = $financial->project;

        $financial->update($request->validated());
        return redirect()
            ->route('projects.financial', [$office, $project])
            ->with('success', 'Financial transaction updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financial $financial)
    {
        $financial->delete();
        return redirect()
            ->back()
            ->with('success', 'Financial transaction deleted');
    }
}
