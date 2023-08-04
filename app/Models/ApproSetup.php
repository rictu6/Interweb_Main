<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Yajra\DataTables\Html\Builder;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\Resource\Collection;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;



class ApproSetup extends Model
{
    use Notifiable;
    use LogsActivity;
    use SoftDeletes;


    protected $table = 'tbl_appro_setup';

    protected $primaryKey = 'appro_setup_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appro_setup_id' ,
    'budget_year' ,
        'month' ,
            'fund_source_id' ,
             'pap_code' ,
  'allotment_class_id' ,
  'sub_allotment_no' ,
  'status' ,
  'processedby' ,
  'budget_type' ,
  'file_path',
  'charge_to_regular' ,
    'withdrawn' ,
  'upload_date' ,
     'cms_status_id' ,

  'updated_at' ,
  'created_at' ,
  'deleted_at'
    ];
    public function approdtls()
    {
      return $this->hasMany(ApproSetupDetail::class,'appro_setup_id','appro_setup_id');
    }

}
