<?php

namespace App\Http\Controllers;

use App\Models\ExpenditureType;
use App\Http\Requests\StoreExpenditureTypeRequest;
use App\Http\Requests\UpdateExpenditureTypeRequest;

class ExpenditureTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreExpenditureTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenditureTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenditureType  $expenditureType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenditureType $expenditureType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenditureType  $expenditureType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenditureType $expenditureType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenditureTypeRequest  $request
     * @param  \App\Models\ExpenditureType  $expenditureType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenditureTypeRequest $request, ExpenditureType $expenditureType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenditureType  $expenditureType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenditureType $expenditureType)
    {
        //
    }
}
