<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class DVType extends Model
{
    // use SoftDeletes;
    // use LogsActivity;

    protected $table = 'tbl_fdms_dv_type';
    protected $primaryKey = 'dv_type_id';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "DV type was {$eventName}";
    }
}
