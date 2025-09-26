<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusDemand extends Model
{
    protected $fillable = ['daily_report_id', 'site_id', 'bus_types_id', 'garden', 'got'];

    public function dailyReport()
    {
        return $this->belongsTo(DailyReport::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function busType()
    {
        return $this->belongsTo(BusTypes::class, 'bus_types_id');
    }
}
