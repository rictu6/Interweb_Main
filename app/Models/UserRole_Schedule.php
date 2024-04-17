<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Carbon\Carbon;
class UserRole_Schedule extends Model
{
    use Notifiable;
    use SoftDeletes;
    use LogsActivity;
   

    public $guarded=[];

    protected $table = 'user_roles';

    public $timestamps=false;
   
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'role_id'
       
    ];
    
   
}
