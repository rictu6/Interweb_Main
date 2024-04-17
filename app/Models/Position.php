<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Position extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_position';

    public $timestamps=false;

    protected $primaryKey = 'pos_id';

    protected $fillable = [
        'pos_id',
        'pos_desc',
        'salary',
        'salary_grade'
    ];
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Position was {$eventName}";
    }
    
}

