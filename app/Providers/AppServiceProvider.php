<?php

namespace App\Providers;

use App\Models\ActiveFiscalYear;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $activeFiscalYear = ActiveFiscalYear::first();
        Session::put('active_fiscal_year', $activeFiscalYear->fiscal_year_id);
    }
}
