<?php

namespace App\Console\Commands;

use App\Mail\DailyReportMail;
use App\Models\Bus;
use App\Models\DailyReport;
use App\Models\ReportList;
use App\Models\ServiceWorksheet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dailyReport = DailyReport::where('is_active', true)->with(['busDemands.site', 'busDemands.busType', 'trafficEvents.bus.site'])->first();

        $groupedBusDemands = $dailyReport->busDemands->groupBy(function ($demand) {
            return $demand->site->name ?? 'Nincs telephely';
        });

        $buses = Bus::with(['serviceWorksheets', 'site'])->whereHas('serviceWorksheets', function ($g){
            $g->where('end', '>', now()->subHour(7))->orWhereNull('end');
        })->get();

        $groupedBuses = $buses->groupBy(function ($bus){
            return $bus->site->name ?? 'Nincs telephely';
        });

        $to = ReportList::where('daily_report', true)->pluck('email')->toArray();

        Mail::to($to)->send(new DailyReportMail($dailyReport, $groupedBusDemands, $groupedBuses));

        $dailyReport->is_active = false;
        $dailyReport->save();

        DailyReport::create([
           'report_date' => now()->toDateString(),
           'is_active' => true,
        ]);
    }
}
