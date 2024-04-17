<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'permissions';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'module_id',
        'name',
        'key'
     
    ];
 
    public function module()
    {
        return $this->belongsTo(Module::class,'module_id','id')->withTrashed();
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Permission was {$eventName}";
    }
    
}
