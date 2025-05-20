<?php

use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\AnnouncementController;
use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CarController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactUsController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DealerProgramController;
use App\Http\Controllers\Dashboard\FooterController;
use App\Http\Controllers\Dashboard\GalleryController;
use App\Http\Controllers\Dashboard\HistoryCategoryController;
use App\Http\Controllers\Dashboard\ModelController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PageStatusController;
use App\Http\Controllers\Dashboard\PartnerController;
use App\Http\Controllers\Dashboard\PrivacyPolicyController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductReviewController;
use App\Http\Controllers\Dashboard\ServicesController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\SupportTicketController;
use App\Http\Controllers\Dashboard\TeamMemberController;
use App\Http\Controllers\Dashboard\TermsAndConditionController;
use App\Http\Controllers\Dashboard\YearController;
use App\Http\Controllers\PageBreadcrumpController;
use App\Models\PageStatus;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

// Dashboard Routes
// ---------------------
Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth:web')
    ->name('dashboard');

// Dashboard Routes
// ==============================================================================
Route::name('dashboard.')
    ->middleware('auth:web')
    ->group(function () {

        // Car Routes : 
        // ---------------------
        Route::resource('cars', CarController::class)->only(['index', 'create', 'edit']);
        Route::controller(CarController::class)
            ->prefix('cars')
            ->name('cars.')
            ->group(function () {
                Route::get('history/{car}', 'carHistory')->name('history');
            });

        // History Category Routes :
        // ---------------------
        Route::resource('history-categories', HistoryCategoryController::class)->only(['index', 'create', 'edit']);

        // Countries Routes :
        // ------------------------------------------
        Route::resource('countries', CountryController::class);
    });
