<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportList extends Model
{
    protected $fillable = [
        'name',
        'email',
        'daily_report',
        'all_email',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
