<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Muncit extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_muncit';

    public $timestamps=false;

    protected $primaryKey = 'muncit_id';

    protected $fillable = [
        'muncit_id',
        'muncit_desc',
        'reg_code',
        'prov_code',
        'psgc',
        'inc_class'
       
     
    ];
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Municipality Status was {$eventName}";
    }
    
}
