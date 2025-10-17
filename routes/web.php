<?php

use App\Models\Bus;
use App\Models\DailyReport;
use App\Models\ServiceWorksheet;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return Inertia::render('Welcome');
//})->name('home');

Route::redirect('/', '/admin');

//Route::get('dashboard', function () {
//    return Inertia::render('Dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tester', function (){
    $dailyReport = DailyReport::where('is_active', true)->with(['busDemands.site','busDemands', 'trafficEvents.bus.site'])->first();

    $groupedBusDemands = $dailyReport->busDemands->groupBy(function ($demand) {
        return $demand->site->name ?? 'Nincs telephely';
    });

//    $buses = Bus::with(['serviceWorksheets', 'site'])->whereHas('serviceWorksheets', function ($g){
//        $g->where('end', '>', now()->subHour(7))->orWhereNull('end');
//    })->get();

    $buses = Bus::with(['serviceWorksheets', 'site'])->whereHas('serviceWorksheets', function ($g){
        $g->where('end', '>', now()->subHour(7))->orWhereNull('end');
    })->get();

    $groupedBuses = $buses->groupBy(function ($bus){
        return $bus->site->name ?? 'Nincs telephely';
    });


    dd($groupedBuses);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
