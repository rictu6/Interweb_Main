<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Timetable extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_timetable';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'weekday',
        'agenda_id',
        'end_time',
        'user_id',
        'start_time'
     
    ];
    public function weekday()
    {
        return $this->belongsTo(Weekday::class,'weekday','wd_id')->withTrashed();
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Timetable was {$eventName}";
    }
    
}
