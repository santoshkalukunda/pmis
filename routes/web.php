<?php

use App\Http\Controllers\ActiveFiscalYearController;
use App\Http\Controllers\BudgetSourceController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//offices
Route::get('offices', [OfficeController::class, 'index'])->name('offices.index');
Route::post('offices', [OfficeController::class, 'store'])->name('offices.store');
Route::get('offices/{office}/edit', [OfficeController::class, 'edit'])->name('offices.edit');
Route::put('offices/{office}', [OfficeController::class, 'update'])->name('offices.update');
Route::delete('offices/{office}', [OfficeController::class, 'destroy'])->name('offices.destroy');

//budget-source
Route::get('budget-sources', [BudgetSourceController::class, 'index'])->name('budget-sources.index');
Route::post('budget-sources', [BudgetSourceController::class, 'store'])->name('budget-sources.store');
Route::get('budget-sources/{budgetSource}/edit', [BudgetSourceController::class, 'edit'])->name('budget-sources.edit');
Route::put('budget-sources/{budgetSource}', [BudgetSourceController::class, 'update'])->name('budget-sources.update');
Route::delete('budget-sources/{budgetSource}', [BudgetSourceController::class, 'destroy'])->name('budget-sources.destroy');

//fiscal-years
Route::get('fiscal-years', [FiscalYearController::class, 'index'])->name('fiscal-years.index');
Route::post('fiscal-years', [FiscalYearController::class, 'store'])->name('fiscal-years.store');
Route::get('fiscal-years/{fiscalYear}/edit', [FiscalYearController::class, 'edit'])->name('fiscal-years.edit');
Route::put('fiscal-years/{fiscalYear}', [FiscalYearController::class, 'update'])->name('fiscal-years.update');
Route::delete('fiscal-years/{fiscalYear}', [FiscalYearController::class, 'destroy'])->name('fiscal-years.destroy');

//active fiscal year
Route::post('active-fiscal-years', [ActiveFiscalYearController::class, 'store'])->name('active-fiscal-years.store');

//project
Route::get('projects/offices', [ProjectController::class, 'office'])->name('projects.offices');
Route::get('projects/{office}/secondlevel', [ProjectController::class, 'secondlevel'])->name('projects.secondlevel');
Route::get('projects/{office}', [ProjectController::class, 'index'])->name('projects.index');

Route::get('projects/{office}/create', [ProjectController::class, 'create'])->name('projects.create');

Route::post('projects/{office}', [ProjectController::class, 'store'])->name('projects.store');
Route::get('projects/{office}/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::get('projects/{office}/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::put('projects/{office}/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('projects/{office}/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
Route::get('projects/{office}/{project}/financial', [ProjectController::class, 'financial'])->name('projects.financial');
Route::get('projects/{office}/{project}/financial/{financial}/edit', [ProjectController::class, 'financialEdit'])->name('projects.financial.edit');

//financial
Route::post('finacials/{project}', [FinancialController::class, 'store'])->name('financials.store');
Route::put('finacials/{financial}', [FinancialController::class, 'update'])->name('financials.update');
Route::delete('finacials/{financial}', [FinancialController::class, 'destroy'])->name('financials.destroy');
