<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceWorksheet extends Model
{
    protected $table = 'service_worksheets';

    protected $fillable = [
        'bus_id',
        'service_type_id',
        'start',
        'end',
        'description',
    ];
}
