<?php

namespace App\Http\Controllers;

use App\Models\FiscalYear;
use App\Http\Requests\StoreFiscalYearRequest;
use App\Http\Requests\UpdateFiscalYearRequest;

class FiscalYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FiscalYear $fiscalYear)
    {
        if (!$fiscalYear) {
            $fiscalYear = new FiscalYear();
        }

        $fiscalYears = FiscalYear::orderBy('fiscal_year','desc')->get();

        return view('fiscal-year.index',compact('fiscalYear', 'fiscalYears'));
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
     * @param  \App\Http\Requests\StoreFiscalYearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFiscalYearRequest $request)
    {
        FiscalYear::create($request->validated());
        return redirect()->route('fiscal-years.index')->with('success',"Fiscal year Created");
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function show(FiscalYear $fiscalYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function edit(FiscalYear $fiscalYear)
    {
       return $this->index($fiscalYear);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFiscalYearRequest  $request
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFiscalYearRequest $request, FiscalYear $fiscalYear)
    {
        $fiscalYear->update($request->validated());
        return redirect()->route('fiscal-years.index')->with('success',"Fiscal year updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiscalYear $fiscalYear)
    {
        $fiscalYear->delete();
        return redirect()->back()->with('success','fiscal year deleted');
    }
}
