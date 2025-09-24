<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'daily_report_id',
        'title',
        'description',
        'dispatch',
        'event_time',
        'damage_value',
        'personal_injury',
        'eventable_id',
        'eventable_type',
    ];
}
