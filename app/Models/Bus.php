<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = "buses";

    protected $fillable = [
        'license_plate',
        'site_id',
        'bus_type_id',
    ];

}
