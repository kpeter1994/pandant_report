<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $fillable = ['report_date'];

    public function trafficEvents()
    {
        return $this->hasMany(TrafficEvent::class);
    }

    public function siteEvents()
    {
        return $this->hasMany(SiteEvent::class);
    }
}
