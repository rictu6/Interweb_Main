<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;



class FTA extends Model
{
    use Notifiable;
    use LogsActivity;
    use SoftDeletes;


    protected $table = 'tbl_fta';

    protected $primaryKey = 'fta_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fta_id',
        'leavetype',
        'destination',
        'exact_destination',
        'datefrom',
        'dateto',
        'lce_id',
        'remarks',

    'updated_at',
    'created_at',
    'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function local_chief_exec()
    {
        return $this->belongsTo(LCE::class,'lce_id','lce_id')->withTrashed();
    }


    public function getDescriptionForEvent(string $eventName): string
    {
        return "FTA was {$eventName}";
    }


}
