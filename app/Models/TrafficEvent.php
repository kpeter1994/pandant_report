<?php

namespace App\Models;

use App\Mail\EventEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

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


            $emails = collect();

            if ($trafficEvent->user?->email) {
                $emails->push($trafficEvent->user->email);
            }

            $emails = $emails->merge(
                ReportList::where('all_email', true)->pluck('email')
            );

            if ($trafficEvent->bus?->site_id) {
                $emails = $emails->merge(
                    ReportList::where('site_id', $trafficEvent->bus->site_id)
                        ->where('local_event', true)
                        ->pluck('email')
                );
            }

            $emails = $emails->unique()->filter();

            Mail::to($emails)->send(new EventEmail($trafficEvent));
        });
    }



}
