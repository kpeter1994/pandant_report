<?php

use App\Models\DailyReport;
use App\Models\ServiceWorksheet;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tester', function (){
    $dailyReport = DailyReport::where('is_active', true)->with(['busDemands.site','busDemands', 'trafficEvents.bus.site'])->first();

    $groupedBusDemands = $dailyReport->busDemands->groupBy(function ($demand) {
        return $demand->site->name ?? 'Nincs telephely';
    });
    $query = ServiceWorksheet::where('end', '>', now())->orWhereNull('end');

    $serviceWorksheets = [];

    $serviceWorksheets['Tartósan javítás alatt'] = (clone $query)->where('start', '<', now()->subDays(7))->get();
    $serviceWorksheets['Vonali javítás'] = (clone $query)
        ->whereHas('serviceType', function ($q) {
        $q->where('name', 'Vonal javítás');
    })->get();
    $serviceWorksheets['Járatkimaradás'] = (clone $query)
        ->whereHas('serviceType', function ($q) {
            $q->where('name', 'Járatkimaradás');
        })->get();

    dd($dailyReport);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
