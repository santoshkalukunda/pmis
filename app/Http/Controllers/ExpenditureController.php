<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Http\Requests\StoreExpenditureRequest;
use App\Http\Requests\UpdateExpenditureRequest;
use App\Models\Project;

class ExpenditureController extends Controller
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
     * @param  \App\Http\Requests\StoreExpenditureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenditureRequest $request, Project $project)
    {
        $project->expenditure()->create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'expenditure created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function show(Expenditure $expenditure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenditure $expenditure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenditureRequest  $request
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenditureRequest $request, Expenditure $expenditure)
    {
        $office = $expenditure->project->office;
        $project = $expenditure->project;
        $expenditure->update($request->validated());

        return redirect()
            ->route('projects.expenditures', [$office, $project])
            ->with('success', 'budget updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenditure $expenditure)
    {
        $expenditure->delete();
        return redirect()
            ->back()
            ->with('success', 'expenditure deleted');
    }
}
