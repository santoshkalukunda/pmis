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
    public function index(BudgetSource $budgetSource = null)
    {
        if (!$budgetSource) {
            $budgetSource = new BudgetSource();
        }

        $budgetSources = BudgetSource::get();

        return view('budget-source.index',compact('budgetSource', 'budgetSources'));
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
        BudgetSource::create($request->validated());
        return redirect()->route('budget-sources.index')->with('success',"Budget Source Created");
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
        return $this->index($budgetSource);
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
        $budgetSource->update($request->validated());
        return redirect()->route('budget-sources.index')->with('success','Budget Source Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BudgetSource  $budgetSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(BudgetSource $budgetSource)
    {
        $budgetSource->delete();
        return redirect()->back()->with('success','Budget source Deleted');
    }
}
