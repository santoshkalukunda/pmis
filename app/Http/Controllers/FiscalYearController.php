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
     * @param  \App\Http\Requests\StoreFiscalYearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFiscalYearRequest $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FiscalYear  $fiscalYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiscalYear $fiscalYear)
    {
        //
    }
}
