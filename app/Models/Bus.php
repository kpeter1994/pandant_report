<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = "buses";

    protected $fillable = [
        'license_plate',
        'site_id',
        'bus_types_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function busType()
    {
        return $this->belongsTo(BusTypes::class, 'bus_types_id');
    }

    public function serviceWorksheets()
    {
        return $this->belongsToMany(ServiceWorksheet::class);
    }

}
