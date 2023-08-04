<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Office extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_office';

    public $timestamps=false;

    protected $primaryKey = 'office_id';

    protected $fillable = [
        'office_id',
        'office_desc'
    ];
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Office was {$eventName}";
    }
    
}
