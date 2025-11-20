<?php

namespace App\Models;

use Carbon\Carbon;
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
        'alien_fault',
        'user_id',
        'elimination',
        'extraordinary'
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

        static::created(function ($trafficEvent) {
            if ($trafficEvent->elimination){
                ServiceWorksheet::create([
                    'bus_id' => $trafficEvent->bus_id,
                    'service_type_id' => ServiceType::where('name','Járatkimaradás')->first()->id,
                    'start' => Carbon::today()->setTimeFromTimeString($trafficEvent->event_time),
                    'end' => Carbon::today()->setTimeFromTimeString($trafficEvent->event_time),
                    'open' => false
                ]);
            }
        });
    }



}
