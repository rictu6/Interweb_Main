<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class EmpStatus extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_empstatus';

    public $timestamps=false;

    protected $primaryKey = 'emp_status_id';

    protected $fillable = [
        'emp_status_id',
        'stat_desc'
     
    ];
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Employee Status was {$eventName}";
    }
    
}
