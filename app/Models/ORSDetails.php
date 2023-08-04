<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ORSDetails extends Model
{ use SoftDeletes;

    protected $table = 'tbl_ors_dtl';
    protected $primaryKey = 'ors_dtl_id';
    protected $fillable=['ors_dtl_id','allotment_class_id',
    'ors_id','responsibility_center','pap_id',
    'uacs_id', 'sub_allotment_id',
     'subsidiary_ledger', 'amount',
     'updated_at',
    'created_at',
    'deleted_at'];

    //  public function orsheader()
    //  {
    //    return $this->belongsTo(ORSHeader::class,'ors_hdr_id','ors_dtl_id');
    //  }
     public function responsibilitycenter()
     {
       return $this->belongsTo(ResponsibilityCenter::class,'res_center_id','responsibility_center');
     }
    //  public function chargeto()
    //  {
    //    return $this->belongsTo(Chargeto::class,'charge_id','charge_to');
    //  }
     public function pap()
     {
       return $this->belongsTo(PAP::class,'pap_id','pap_id');
     }
    //  public function suballotment()//omit coz loaded here is aprrosetup
    //  {
    //    return $this->belongsTo(SubAllotment::class,'sub_allotment_id','sub_allotment_id');
    //  }
    //  public function uacs()
    //  {
    //    return $this->belongsTo(UACS::class,'uacs_subobject_id','uacs_id');
    //  }
     public function appro_sub_allotment()
     {
       return $this->belongsTo(ApproSetup::class,'sub_allotment_no','sub_allotment_id');
     }

     public function uacs()
     {
       return $this->belongsTo(UACS::class,'uacs_id','uacs_subobject_id');
     }
     public function getDepositAttribute()
     {

// $deposit = 100000;

// return $deposit;
     }

   public function getWithdrawalAttribute()
   {
// Calculate the withdrawal based on your logic using the running balance
// and return the calculated value
   }

   public function getBalanceAttribute()
   {
// Calculate the balance based on your logic using the running balance
// and return the calculated value
   }
}
