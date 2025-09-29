<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    protected $fillable = ['report_date'];

    public $with = ['trafficEvents', 'siteEvents', 'busDemands'];

    public function trafficEvents()
    {
        return $this->hasMany(TrafficEvent::class);
    }

    public function siteEvents()
    {
        return $this->hasMany(SiteEvent::class);
    }

    public function busDemands()
    {
        return $this->hasMany(BusDemand::class);
    }
}
