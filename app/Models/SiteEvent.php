<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
