<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Province extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_prov';

    public $timestamps=false;

    protected $primaryKey = 'prov_id';

    protected $fillable = [
        'prov_id',
        'prov_desc',
        'reg_code',
        'prov_code',
        'psgc',
        'inc_class'
       
     
    ];
    
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Province was {$eventName}";
    }
    
}
