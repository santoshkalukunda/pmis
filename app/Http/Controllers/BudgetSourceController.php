<?php

namespace App\Http\Controllers;

use App\Models\BudgetSource;
use App\Http\Requests\StoreBudgetSourceRequest;
use App\Http\Requests\UpdateBudgetSourceRequest;

class BudgetSourceController extends Controller
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
     * @param  \App\Http\Requests\StoreBudgetSourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBudgetSourceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetSource $budgetSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetSource $budgetSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBudgetSourceRequest  $request
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBudgetSourceRequest $request, BudgetSource $budgetSource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetSource $budgetSource)
    {
        //
    }
}
