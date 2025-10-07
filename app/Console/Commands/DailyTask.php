<?php

namespace App\Console\Commands;

use App\Mail\DailyReportMail;
use App\Models\DailyReport;
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

//        dd($groupedBusDemands);
        # $dailyReport->is_active = false;
        # $dailyReport->save();

        Mail::to('smitpeter777@gmail.com')->send(new DailyReportMail($dailyReport, $groupedBusDemands, $serviceWorksheets));

        # DailyReport::create([
        #    'report_date' => now()->toDateString(),
        #    'is_active' => true,
        # ]);
    }
}
