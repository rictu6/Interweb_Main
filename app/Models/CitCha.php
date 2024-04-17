<?php

namespace App\Models;



use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CitCha extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_css_citcha';
    protected $primaryKey = 'id';
    protected $fillable=['id', 'survey_type',
    'service_id', 'date_doc_released',
    'date_service_rendered','client_type',
    'name','contact', 'email','age',
    'gender','office', 'province','muncit','others',
    'cc1','cc2', 'cc3','sqd0','sqd1', 'sqd2','sqd3','sqd4', 'sqd5','sqd6',
    'sqd7', 'sqd8','suggestions',
           'updated_at',
          'created_at',
          'deleted_at'];


         // protected $appends = ['service_count'];

        //   public static function countService()
        //   {
        //       return self::select('service_id', DB::raw('count(*) as count'))
        //           ->groupBy('service_id')
        //           ->get();
        //   }
          public function office_()
          {
              return $this->belongsTo(Office::class,'office','office_id')->withTrashed();
          }
          public function service()
          {
              return $this->belongsTo(Service::class,'service_id','id')->withTrashed();
          }
          public function division()
          {
              return $this->belongsTo(Division::class,'div_id','div_id')->withTrashed();
          }
          public function muncit()
          {
              return $this->belongsTo(Muncit::class,'muncit_id','muncit_id')->withTrashed();
          }
}
