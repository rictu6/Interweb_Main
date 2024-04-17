<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class DVObli extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_fdms_dv_obli';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'dv_id',
       'ors_no',
        'created_at',
        'updated_at',
        'deleted_at'

    ];


    // public function user()
    // {
    //     return $this->belongsTo(User::class,'emp_id','emp_id');
    // }

}
