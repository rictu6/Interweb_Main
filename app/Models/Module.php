<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Module extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'modules';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name'
     
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class,'module_id','id');
    }
}
