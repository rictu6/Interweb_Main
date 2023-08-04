<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Section extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_section';

    public $timestamps=false;

    protected $primaryKey = 'sec_id';

    protected $casts = [
        'created_at'  => 'date:d-m-Y H:i',
    ];

    protected $fillable = [
        'sec_id',
        'sec_desc',
        'office_id',
        'div_id'
    ];
    public function office()
    {
        return $this->belongsTo(Office::class,'office_id','office_id')->withTrashed();
    }
    public function division()
    {
        return $this->belongsTo(Division::class,'div_id','div_id')->withTrashed();
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Section was {$eventName}";
    }
    
}
