<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Attendee extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_employee';

    public $timestamps=false;

    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'emp_id',
        'last_name'
    ];
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Employee was {$eventName}";
    }
    
}
