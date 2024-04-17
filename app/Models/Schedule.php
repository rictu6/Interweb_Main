<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;
class Schedule extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_schedule';

    public $timestamps=false;
    protected $dates = ['date'];
    protected $primaryKey = 'id';

    protected $fillable = [
        'posted_by',
        'posted_date',
        'title',
'venue',
        'office_id',
        'div_id',
        'sec_id',
        'emp_id',
       'attendee',
     'color',
        'start',
        'end'
     
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Schedule was {$eventName}";
    }
    public function office()
    {
        return $this->belongsTo(Office::class,'office_id','office_id')->withTrashed();
    }
    public function division()
    {
        return $this->belongsTo(Division::class,'div_id','div_id')->withTrashed();
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'sec_id','sec_id')->withTrashed();
    }
    public function position()
    {
        return $this->belongsTo(Position::class,'pos_id','pos_id')->withTrashed();
    }


	
   
    public function roles()
    {
        return $this->hasMany(ScheduleUser::class,'schedule_id','id');
    }

    // public function att()
    // {
    //     return $this->hasMany(ScheduleUser::class,'schedule_id','id');
    // }
}
