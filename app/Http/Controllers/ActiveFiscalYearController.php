<?php

namespace App\Http\Controllers;

use App\Models\ActiveFiscalYear;
use App\Http\Requests\StoreActiveFiscalYearRequest;
use App\Http\Requests\UpdateActiveFiscalYearRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ActiveFiscalYearController extends Controller
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
     * @param  \App\Http\Requests\StoreActiveFiscalYearRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActiveFiscalYearRequest $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $activeFiscalYear = $user->activeFiscalYear()->first();
        if ($activeFiscalYear) {
            $user->activeFiscalYear()->update($request->validated());
        } else {
            $user->activeFiscalYear()->create($request->validated());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActiveFiscalYear  $activeFiscalYear
     * @return \Illuminate\Http\Response
     */
    public function show(ActiveFiscalYear $activeFiscalYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActiveFiscalYear  $activeFiscalYear
     * @return \Illuminate\Http\Response
     */
    public function edit(ActiveFiscalYear $activeFiscalYear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActiveFiscalYearRequest  $request
     * @param  \App\Models\ActiveFiscalYear  $activeFiscalYear
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActiveFiscalYearRequest $request, ActiveFiscalYear $activeFiscalYear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActiveFiscalYear  $activeFiscalYear
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActiveFiscalYear $activeFiscalYear)
    {
        //
    }
}
