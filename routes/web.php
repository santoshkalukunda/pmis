<?php

use App\Http\Controllers\AcheivementController;
use App\Http\Controllers\ActiveFiscalYearController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\BudgetSourceController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\ExpenditureTypeController;
use App\Http\Controllers\FinancialController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['role:Super-Admin']], function () {
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

    //Project-Type
    Route::get('project-types', [ProjectTypeController::class, 'index'])->name('project-types.index');
    Route::post('project-types', [ProjectTypeController::class, 'store'])->name('project-types.store');
    Route::get('project-types/{projectType}/edit', [ProjectTypeController::class, 'edit'])->name('project-types.edit');
    Route::put('project-types/{projectType}', [ProjectTypeController::class, 'update'])->name('project-types.update');
    Route::delete('project-types/{projectType}', [ProjectTypeController::class, 'destroy'])->name('project-types.destroy');

    //Expenditure-Type
    Route::get('expenditure-types', [ExpenditureTypeController::class, 'index'])->name('expenditure-types.index');
    Route::post('expenditure-types', [ExpenditureTypeController::class, 'store'])->name('expenditure-types.store');
    Route::get('expenditure-types/{expenditureType}/edit', [ExpenditureTypeController::class, 'edit'])->name('expenditure-types.edit');
    Route::put('expenditure-types/{expenditureType}', [ExpenditureTypeController::class, 'update'])->name('expenditure-types.update');
    Route::delete('expenditure-types/{expenditureType}', [ExpenditureTypeController::class, 'destroy'])->name('expenditure-types.destroy');

    //active fiscal year
    Route::post('active-fiscal-years', [ActiveFiscalYearController::class, 'store'])->name('active-fiscal-years.store');

    //project
    Route::get('projects/offices', [ProjectController::class, 'office'])->name('projects.offices');
    Route::get('projects/{office}/secondlevel', [ProjectController::class, 'secondlevel'])->name('projects.secondlevel');
    Route::get('projects/{office}', [ProjectController::class, 'index'])->name('projects.index');

    //search project
    Route::get('projects/{office}/search', [ProjectController::class, 'search'])->name('projects.search');
    Route::get('projects/{office}/excel', [ProjectController::class, 'excel'])->name('projects.excel');

    Route::get('projects/{office}/create', [ProjectController::class, 'create'])->name('projects.create');
    // Route::get('projects/{office}/physical-progress', [ProjectController::class, 'physicalProgress'])->name('projects.physicalProgress');
    Route::get('projects/{office}/{project}/physical-progress', [ProjectController::class, 'physicalProgress'])->name('projects.physicalProgress');
    Route::post('projects/{office}/{project}/physical-progress', [ProjectController::class, 'physicalProgressUpdate'])->name('projects.physicalProgress.update');
    Route::post('projects/{office}', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{office}/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::get('projects/{office}/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::put('projects/{office}/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects/{office}/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    //financial
    Route::get('projects/{office}/{project}/financial', [ProjectController::class, 'financial'])->name('projects.financial');
    Route::get('projects/{office}/{project}/financial/{financial}/edit', [ProjectController::class, 'financialEdit'])->name('projects.financial.edit');

    Route::post('finacials/{project}', [FinancialController::class, 'store'])->name('financials.store');
    Route::put('finacials/{financial}', [FinancialController::class, 'update'])->name('financials.update');
    Route::delete('finacials/{financial}', [FinancialController::class, 'destroy'])->name('financials.destroy');

    //acheiments
    Route::get('projects/{office}/{project}/acheivements', [ProjectController::class, 'acheivement'])->name('projects.acheivement');
    Route::get('projects/{office}/{project}/acheivements/{acheivement}/edit', [ProjectController::class, 'acheivementEdit'])->name('projects.acheivement.edit');

    Route::post('acheivements/{project}', [AcheivementController::class, 'store'])->name('acheivements.store');
    Route::put('acheivements/{acheivement}', [AcheivementController::class, 'update'])->name('acheivements.update');
    Route::delete('acheivements/{acheivement}', [AcheivementController::class, 'destroy'])->name('acheivements.destroy');

    //indicators
    Route::get('projects/{office}/{project}/indicators', [ProjectController::class, 'indicator'])->name('projects.indicator');
    Route::get('projects/{office}/{project}/indicators/{indicator}/edit', [ProjectController::class, 'indicatorEdit'])->name('projects.indicator.edit');

    Route::post('indicators/{project}', [IndicatorController::class, 'store'])->name('indicators.store');
    Route::put('indicators/{indicator}', [IndicatorController::class, 'update'])->name('indicators.update');
    Route::delete('indicators/{indicator}', [IndicatorController::class, 'destroy'])->name('indicators.destroy');

    //photos
    Route::get('projects/{office}/{project}/photos', [ProjectController::class, 'photo'])->name('projects.photos');

    Route::post('photos/{project}', [PhotoController::class, 'store'])->name('photos.store');
    Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

    //budget
    Route::get('projects/{office}/{project}/budgets', [ProjectController::class, 'budget'])->name('projects.budgets');
    Route::get('projects/{office}/{project}/budgets/{budget}/edit', [ProjectController::class, 'budgetEdit'])->name('projects.budgets.edit');

    Route::post('budgets/{project}', [BudgetController::class, 'store'])->name('budgets.store');
    Route::put('budgets/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
    Route::delete('budgets/{budget}', [BudgetController::class, 'destroy'])->name('budgets.destroy');

    //expenditure
    Route::get('projects/{office}/{project}/expenditures', [ProjectController::class, 'expenditure'])->name('projects.expenditures');
    Route::get('projects/{office}/{project}/expenditures/{expenditure}/edit', [ProjectController::class, 'expenditureEdit'])->name('projects.expenditures.edit');

    Route::post('expenditures/{project}', [ExpenditureController::class, 'store'])->name('expenditures.store');
    Route::put('expenditures/{expenditure}', [ExpenditureController::class, 'update'])->name('expenditures.update');
    Route::delete('expenditures/{expenditure}', [ExpenditureController::class, 'destroy'])->name('expenditures.destroy');

    //users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.changePassword');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    //user profile
    Route::get('profile', [UserController::class, 'profile'])->name('users.profile');

    //log-viewer
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs');
});

Route::group(['middleware' => ['role:Super-Admin|admin']], function () {
    //budget-source
    Route::get('budget-sources', [BudgetSourceController::class, 'index'])->name('budget-sources.index');
    Route::post('budget-sources', [BudgetSourceController::class, 'store'])->name('budget-sources.store');
    Route::get('budget-sources/{budgetSource}/edit', [BudgetSourceController::class, 'edit'])->name('budget-sources.edit');
    Route::put('budget-sources/{budgetSource}', [BudgetSourceController::class, 'update'])->name('budget-sources.update');
    // Route::delete('budget-sources/{budgetSource}', [BudgetSourceController::class, 'destroy'])->name('budget-sources.destroy');

    //Project-Type
    Route::get('project-types', [ProjectTypeController::class, 'index'])->name('project-types.index');
    Route::post('project-types', [ProjectTypeController::class, 'store'])->name('project-types.store');
    Route::get('project-types/{projectType}/edit', [ProjectTypeController::class, 'edit'])->name('project-types.edit');
    Route::put('project-types/{projectType}', [ProjectTypeController::class, 'update'])->name('project-types.update');
    //    Route::delete('project-types/{projectType}', [ProjectTypeController::class, 'destroy'])->name('project-types.destroy');

    //Expenditure-Type
    Route::get('expenditure-types', [ExpenditureTypeController::class, 'index'])->name('expenditure-types.index');
    Route::post('expenditure-types', [ExpenditureTypeController::class, 'store'])->name('expenditure-types.store');
    Route::get('expenditure-types/{expenditureType}/edit', [ExpenditureTypeController::class, 'edit'])->name('expenditure-types.edit');
    Route::put('expenditure-types/{expenditureType}', [ExpenditureTypeController::class, 'update'])->name('expenditure-types.update');
    // Route::delete('expenditure-types/{expenditureType}', [ExpenditureTypeController::class, 'destroy'])->name('expenditure-types.destroy');

    //project
    Route::get('projects/{office}/secondlevel', [ProjectController::class, 'secondlevel'])->name('projects.secondlevel');
    Route::get('projects/{office}', [ProjectController::class, 'index'])->name('projects.index');
    //search project
    Route::get('projects/{office}/search', [ProjectController::class, 'search'])->name('projects.search');
    Route::get('projects/{office}/excel', [ProjectController::class, 'excel'])->name('projects.excel');

    Route::get('projects/{office}/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::get('projects/{office}/{project}/physical-progress', [ProjectController::class, 'physicalProgress'])->name('projects.physicalProgress');
    Route::post('projects/{office}/{project}/physical-progress', [ProjectController::class, 'physicalProgressUpdate'])->name('projects.physicalProgress.update');
    Route::post('projects/{office}', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{office}/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::get('projects/{office}/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::put('projects/{office}/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('projects/{office}/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    //financial
    Route::get('projects/{office}/{project}/financial', [ProjectController::class, 'financial'])->name('projects.financial');
    Route::get('projects/{office}/{project}/financial/{financial}/edit', [ProjectController::class, 'financialEdit'])->name('projects.financial.edit');

    Route::post('finacials/{project}', [FinancialController::class, 'store'])->name('financials.store');
    Route::put('finacials/{financial}', [FinancialController::class, 'update'])->name('financials.update');
    Route::delete('finacials/{financial}', [FinancialController::class, 'destroy'])->name('financials.destroy');

    //acheiments
    Route::get('projects/{office}/{project}/acheivements', [ProjectController::class, 'acheivement'])->name('projects.acheivement');
    Route::get('projects/{office}/{project}/acheivements/{acheivement}/edit', [ProjectController::class, 'acheivementEdit'])->name('projects.acheivement.edit');

    Route::post('acheivements/{project}', [AcheivementController::class, 'store'])->name('acheivements.store');
    Route::put('acheivements/{acheivement}', [AcheivementController::class, 'update'])->name('acheivements.update');
    Route::delete('acheivements/{acheivement}', [AcheivementController::class, 'destroy'])->name('acheivements.destroy');

    //photos
    Route::get('projects/{office}/{project}/photos', [ProjectController::class, 'photo'])->name('projects.photos');

    Route::post('photos/{project}', [PhotoController::class, 'store'])->name('photos.store');
    Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

    //budget
    Route::get('projects/{office}/{project}/budgets', [ProjectController::class, 'budget'])->name('projects.budgets');
    Route::get('projects/{office}/{project}/budgets/{budget}/edit', [ProjectController::class, 'budgetEdit'])->name('projects.budgets.edit');

    Route::post('budgets/{project}', [BudgetController::class, 'store'])->name('budgets.store');
    Route::put('budgets/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
    Route::delete('budgets/{budget}', [BudgetController::class, 'destroy'])->name('budgets.destroy');

    //expenditure
    Route::get('projects/{office}/{project}/expenditures', [ProjectController::class, 'expenditure'])->name('projects.expenditures');
    Route::get('projects/{office}/{project}/expenditures/{expenditure}/edit', [ProjectController::class, 'expenditureEdit'])->name('projects.expenditures.edit');

    Route::post('expenditures/{project}', [ExpenditureController::class, 'store'])->name('expenditures.store');
    Route::put('expenditures/{expenditure}', [ExpenditureController::class, 'update'])->name('expenditures.update');
    Route::delete('expenditures/{expenditure}', [ExpenditureController::class, 'destroy'])->name('expenditures.destroy');

    //user profile
    Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.changePassword');
});

Route::group(['middleware' => ['role:Super-Admin|admin|user']], function () {
    //project
    Route::get('projects/{office}/secondlevel', [ProjectController::class, 'secondlevel'])->name('projects.secondlevel');
    Route::get('projects/{office}', [ProjectController::class, 'index'])->name('projects.index');
    //search project
    Route::get('projects/{office}/search', [ProjectController::class, 'search'])->name('projects.search');
    Route::get('projects/{office}/excel', [ProjectController::class, 'excel'])->name('projects.excel');

    Route::get('projects/{office}/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::get('projects/{office}/{project}/physical-progress', [ProjectController::class, 'physicalProgress'])->name('projects.physicalProgress');
    Route::post('projects/{office}/{project}/physical-progress', [ProjectController::class, 'physicalProgressUpdate'])->name('projects.physicalProgress.update');
    Route::post('projects/{office}', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{office}/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::get('projects/{office}/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::put('projects/{office}/{project}', [ProjectController::class, 'update'])->name('projects.update');
    // Route::delete('projects/{office}/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    //financial
    Route::get('projects/{office}/{project}/financial', [ProjectController::class, 'financial'])->name('projects.financial');
    Route::get('projects/{office}/{project}/financial/{financial}/edit', [ProjectController::class, 'financialEdit'])->name('projects.financial.edit');

    Route::post('finacials/{project}', [FinancialController::class, 'store'])->name('financials.store');
    Route::put('finacials/{financial}', [FinancialController::class, 'update'])->name('financials.update');
    // Route::delete('finacials/{financial}', [FinancialController::class, 'destroy'])->name('financials.destroy');

    //acheiments
    Route::get('projects/{office}/{project}/acheivements', [ProjectController::class, 'acheivement'])->name('projects.acheivement');
    Route::get('projects/{office}/{project}/acheivements/{acheivement}/edit', [ProjectController::class, 'acheivementEdit'])->name('projects.acheivement.edit');

    Route::post('acheivements/{project}', [AcheivementController::class, 'store'])->name('acheivements.store');
    Route::put('acheivements/{acheivement}', [AcheivementController::class, 'update'])->name('acheivements.update');
    // Route::delete('acheivements/{acheivement}', [AcheivementController::class, 'destroy'])->name('acheivements.destroy');

    //photos
    Route::get('projects/{office}/{project}/photos', [ProjectController::class, 'photo'])->name('projects.photos');

    Route::post('photos/{project}', [PhotoController::class, 'store'])->name('photos.store');
    // Route::delete('photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

    //budget
    Route::get('projects/{office}/{project}/budgets', [ProjectController::class, 'budget'])->name('projects.budgets');
    Route::get('projects/{office}/{project}/budgets/{budget}/edit', [ProjectController::class, 'budgetEdit'])->name('projects.budgets.edit');

    Route::post('budgets/{project}', [BudgetController::class, 'store'])->name('budgets.store');
    Route::put('budgets/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
    // Route::delete('budgets/{budget}', [BudgetController::class, 'destroy'])->name('budgets.destroy');

    //expenditure
    Route::get('projects/{office}/{project}/expenditures', [ProjectController::class, 'expenditure'])->name('projects.expenditures');
    Route::get('projects/{office}/{project}/expenditures/{expenditure}/edit', [ProjectController::class, 'expenditureEdit'])->name('projects.expenditures.edit');

    Route::post('expenditures/{project}', [ExpenditureController::class, 'store'])->name('expenditures.store');
    Route::put('expenditures/{expenditure}', [ExpenditureController::class, 'update'])->name('expenditures.update');
    // Route::delete('expenditures/{expenditure}', [ExpenditureController::class, 'destroy'])->name('expenditures.destroy');

    //user profile
    Route::get('profile', [UserController::class, 'profile'])->name('users.profile');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::post('users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.changePassword');
});
