<?php

use App\Http\Controllers\Company\BusController;
use App\Http\Controllers\Company\TrainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main\CityController;
use App\Http\Controllers\Main\CountryController;
use App\Http\Controllers\Main\FerryController;
use App\Http\Controllers\Main\FooterController;
use App\Http\Controllers\Main\JourneyController;
use App\Http\Controllers\Main\OperatorController;
use App\Http\Controllers\Main\SplitController;
use App\Http\Controllers\PostController;
use App\Models\Footerlink;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/travel-agents{extension?}', [OperatorController::class, 'index'])->where('extension', '(?:.html)?')->name('operator.main');
Route::get('/split{extension?}', [SplitController::class, 'index'])->where('extension', '(?:.html)?')->name('static.split');
Route::get('/travel-agents/{operator}', [OperatorController::class, 'otaDetail'])->where('operator', '.*')->name('operator.detail');

Route::get('/routes{extension?}', [JourneyController::class, 'index'])->where('extension', '(?:.html)?');
Route::get('/trains-to-{to}/{from}-to-{unused}', [JourneyController::class, 'routeDetail'])->where(['to' => '[a-zA-Z\-]+', 'from' => '[a-zA-Z\-]+', 'unused' => '[a-zA-Z\.-]+'])->name('cityroute.route');

//Route::get('/about-us.html', [FooterController::class, 'staticPage']);
//Route::get('/privacy-policy.html', [FooterController::class, 'staticPage']);

Route::get('/popular-routes{extension?}', [JourneyController::class, 'index'])->where('extension', '(?:.html)?');

Route::get('/cities{extension?}', [CityController::class, 'index'])->where('extension', '(?:.html)?');
Route::get('/trains-to-{city}', [CityController::class, 'cityDetail'])->where('city', '.*');

Route::get('/rail-providers{extension?}', [TrainController::class, 'index'])->where('extension', '(?:.html)?')->name('company.rail.main');
Route::get('/rail-providers/{provider}', [TrainController::class, 'railDetail'])->where('provider', '.*')->name('company.rail.detail');

Route::get('/bus-providers{extension?}', [BusController::class, 'index'])->where('extension', '(?:.html)?')->name('company.bus.main');
Route::get('/bus-providers/{busprovider}', [BusController::class, 'busDetail'])->where('provider', '.*')->name('company.bus.detail');

Route::post('/posts', [PostController::class, 'review'])->name('posts.review');

Route::get('/ferries{extension?}', [FerryController::class, 'index'])->where('extension', '(?:.html)?')->name('ferry.main');
Route::get('/ferries/{ferry}', [FerryController::class, 'ferryDetail'])->where('ferry', '.*')->name('ferry.detail');

Route::get('/countries{extension?}', [CountryController::class, 'index'])->where('extension', '(?:.html)?')->name('country.main');
Route::get('/countries/{country}', [CountryController::class, 'countryDetail'])->where('country', '.*')->name('country.detail');

// Route::prefix('')->group(function () {
//     Route::get('{site_map_slug}', [SitemapController::class, 'show'])->where('site_map_slug', '.*');
// });

/**********Footers***********/

$footrs = Footerlink::where('status', '1')->get();

foreach ($footrs as $vroot) {
    Route::prefix('')->group(function () use ($vroot) {
        $strCml = ucwords($vroot->name);
        $strCml = str_replace(" ", "", $strCml);
        $strCml = lcfirst($strCml);
        Route::get('/' . strtolower($vroot->urllink . '.html'), [FooterController::class, $strCml])->name($strCml);
    });
}
