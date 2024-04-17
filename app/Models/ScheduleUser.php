<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class ScheduleUser extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_user_schedule';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'emp_id',
       'schedule_id',
       'attendee_name',
       'start',
       'end',
        'created_at',
        'updated_at',
        'deleted_at'
     
    ];
   
   
    public function user()
    {
        return $this->belongsTo(User::class,'emp_id','emp_id');
    }
  
}
