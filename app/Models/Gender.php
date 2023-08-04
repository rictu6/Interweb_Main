<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Gender extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_gender';

    public $timestamps=false;

    protected $primaryKey = 'gen_id';

    protected $fillable = [
        'gen_id',
        'gen_desc'
     
    ];
   
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Gender was {$eventName}";
    }
    
}
