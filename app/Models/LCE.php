<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;


class LCE extends Model
{
    use SoftDeletes;
    //use Notifiable;
    use LogsActivity;

    protected $table = 'tbl_fta_lce';

    protected $primaryKey = 'lce_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lce_id',
        'fullname',
        'muncit_id',
        'prov_code',
        'designation',
        'is_active',

     'updated_at',
     'created_at',
     'deleted_at'
    ];



    public function muncit()
    {
        return $this->belongsTo(Muncit::class,'muncit_id','muncit_id')->withTrashed();
    }

    public function province()
    {
        return $this->belongsTo(Province::class,'prov_code','prov_code')->withTrashed();
    }


    public function getDescriptionForEvent(string $eventName): string
    {
        return "FTA was {$eventName}";
    }


    
}
