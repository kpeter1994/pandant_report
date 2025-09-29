<?php

namespace App\Console\Commands;

use App\Mail\DailyReportMail;
use App\Models\DailyReport;
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
        $dailyReport = DailyReport::where('is_active', true)->first();
        # $dailyReport->is_active = false;
        # $dailyReport->save();

        Mail::to('smitpeter777@gmail.com')->send(new DailyReportMail($dailyReport));

        # DailyReport::create([
        #    'report_date' => now()->toDateString(),
        #    'is_active' => true,
        # ]);
    }
}
