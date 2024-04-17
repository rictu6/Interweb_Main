<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Division extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_division';

    public $timestamps=false;

    protected $primaryKey = 'div_id';

    protected $fillable = [
        'div_id',
        'div_desc',
        'acronym'
     
    ];
    public function users()
    {
        return $this->hasMany(User::class,'div_id','div_id');
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Division was {$eventName}";
    }
    
}
