<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class DVReceiving extends Model
{ use SoftDeletes;


    use LogsActivity;

    protected $table = 'tbl_fdms_dv_received';
    protected $primaryKey = 'dv_received_id';
    protected $fillable=['dv_received_id','office_id', 'dv_type',
    'ors_hdr_id', 'dv_no', 'dv_date',
      'payee_id',
     'generated_by',
         'dv_hdr_id',
         'check_no',
           'updated_at',
          'created_at',
          'deleted_at'];

          public function processed()
          {
              return $this->belongsTo(User::class,'generated_by','emp_id')->withTrashed();
          }
          public function office()
          {
              return $this->belongsTo(ResponsibilityCenter::class,'res_center_id','office_id')->withTrashed();
          }
          public function payee()
          {
              return $this->belongsTo(Payee::class,'payee_id','payee_id')->withTrashed();
          }

          public function d_v_type()
          {
              return $this->belongsTo(DVType::class,'dv_type_id','dv_type')->withTrashed();
          }
          public function o_r_s()
          {
              return $this->hasMany(ORSHeader::class,'ors_hdr_id','ors_hdr_id')->withTrashed();
          }
          public function obli()
          {
              return $this->hasMany(DVObli::class,'dv_id','dv_received_id')->withTrashed();
          }
}
