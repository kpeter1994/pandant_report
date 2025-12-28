<?php

namespace App\Models;

use App\Mail\EventEmail;
use App\Mail\SiteEventEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class SiteEvent extends Model
{
    protected $fillable = [
        'daily_report_id',
        'site_id',
        'title',
        'description',
        'event_time',
    ];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    protected static function booted()
    {
        static::creating(function ($siteEvent) {
            $actualReport = DailyReport::where('is_active', true)->first();
            $siteEvent->daily_report_id = $actualReport->id;

            $emails = collect();

            if ($siteEvent->user?->email) {
                $emails->push($siteEvent->user->email);
            }

            $emails = $emails->merge(
                ReportList::where('all_email', true)->pluck('email')
            );

            if ($siteEvent->site_id) {
                $emails = $emails->merge(
                    ReportList::where('site_id', $siteEvent->site_id)
                        ->where('local_event', true)
                        ->pluck('email')
                );
            }

            $emails = $emails->unique()->filter();


            Mail::to($emails)->send(new SiteEventEmail($siteEvent));
        });
    }
}
