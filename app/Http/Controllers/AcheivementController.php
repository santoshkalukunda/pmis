<?php

namespace App\Http\Controllers;

use App\Models\Acheivement;
use App\Http\Requests\StoreAcheivementRequest;
use App\Http\Requests\UpdateAcheivementRequest;
use App\Models\Project;

class AcheivementController extends Controller
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
     * @param  \App\Http\Requests\StoreAcheivementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAcheivementRequest $request, Project $project)
    {
        $project->acheivement()->create($request->validated());
        return redirect()
            ->back()
            ->with('success', 'Acheivement created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acheivement  $acheivement
     * @return \Illuminate\Http\Response
     */
    public function show(Acheivement $acheivement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acheivement  $acheivement
     * @return \Illuminate\Http\Response
     */
    public function edit(Acheivement $acheivement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAcheivementRequest  $request
     * @param  \App\Models\Acheivement  $acheivement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAcheivementRequest $request, Acheivement $acheivement)
    {
        $office = $acheivement->project->office;
        $project = $acheivement->project;
        
        $acheivement->update($request->validated());
        return redirect()
            ->route('projects.acheivement',[$office, $project])
            ->with('success', 'Acheivement updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acheivement  $acheivement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acheivement $acheivement)
    {
        $acheivement->delete();
        return redirect()
            ->back()
            ->with('success', 'Acheivement Deleted');
    }
}
