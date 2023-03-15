<?php

namespace App\Http\Controllers;

use App\Models\ActiveFiscalYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activeFiscalYear = ActiveFiscalYear::first();
        Session::put('active_fiscal_year', $activeFiscalYear->fiscal_year_id);
        return view('home');
    }
}
