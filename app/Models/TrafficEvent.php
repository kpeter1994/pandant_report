<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrafficEvent extends Model
{
    protected $fillable = [
        'daily_report_id',
        'bus_id',
        'description',
        'dispatch',
        'event_time',
        'damage_value',
        'personal_injury',
    ];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    protected static function booted()
    {
        static::creating(function ($trafficEvent) {
            $actualReport = DailyReport::where('is_active', true)->first();
            $trafficEvent->daily_report_id = $actualReport->id;
        });
    }

}
