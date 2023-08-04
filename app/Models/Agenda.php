<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Agenda extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_agenda';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'agenda_date'
     
    ];
    public function users()
    {
        return $this->hasMany(User::class,'emp_id','attendee_id');
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Agenda was {$eventName}";
    }
    
}
