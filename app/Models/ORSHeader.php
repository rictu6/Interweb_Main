<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class ORSHeader extends Model
{ use SoftDeletes;

    use LogsActivity;

    protected $table = 'tbl_ors_hdr';
    protected $primaryKey = 'ors_hdr_id';
    protected $fillable=['office_id', 'type',
    'ors_hdr_id', 'ors_no', 'ors_date',
     'particulars', 'budget_type_id', 'fund_cluster_id',
      'fund_source_id', 'uacs_subclass_id', 'payee',
       'office', 'address',
        'status_code', 'created_by',
         'date_created', 'date_received',
          'dv_received_id', 'cms_submission_history_id',
          'payee_id', 'dv_trust_receipts_id',
           'updated_at',
          'created_at',
          'deleted_at'];

          public function ORSDetails()
          {
            return $this->hasMany(ORSDetails::class,'ors_id','ors_hdr_id');
          }
          public function payee()
          {
              return $this->belongsTo(Payee::class,'payee_id','payee_id')->withTrashed();
          }
          public function fundcluster()
          {
              return $this->belongsTo(FundCluster::class,'fund_cluster_id','fund_cluster_id')->withTrashed();
          }
          public function budgettype()
          {
              return $this->belongsTo(BudgetType::class,'budget_type_id','budget_type_id')->withTrashed();
          }
          public function fundsource()
          {
              return $this->belongsTo(FundSource::class,'fund_source_id','fund_source_id')->withTrashed();
          }
          public function allotmentclass()
          {
              return $this->belongsTo(AllotmentClass::class,'uacs_subclass_id','uacs_subclass_id')->withTrashed();
          }
}
