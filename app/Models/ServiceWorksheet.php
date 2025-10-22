<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceWorksheet extends Model
{
    protected $table = 'service_worksheets';

    protected $with = ['serviceType'];

    protected $fillable = [
        'bus_id',
        'service_type_id',
        'start',
        'end',
        'description',
        'open'
    ];

    public function serviceType(){
        return $this->belongsTo(ServiceType::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
