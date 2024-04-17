<?php

namespace App\Models;



use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyIssued extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_pms_semi_expendable_property_issued';
    protected $primaryKey = 'property_issued_id';
    protected $fillable=['property_issued_id', 'date' ,'property_type','entity_name',
    'ics_rrsp_no',
    'semi_expendable_property_no' ,
    'item_description' ,
    'estimated_useful_life' ,
    'issued_qty' ,
    'issued_office' ,
    'returned_qty' ,
    'returned_office' ,
    're_issued_qty' ,
    're_issued_office' ,
    'disposed_qty' ,
    'balance_qty' ,
    'amount' ,
    'remarks' ];


         // protected $appends = ['service_count'];

        //   public static function countService()
        //   {
        //       return self::select('service_id', DB::raw('count(*) as count'))
        //           ->groupBy('service_id')
        //           ->get();
        //   }
        //   public function office_()
        //   {
        //       return $this->belongsTo(Office::class,'office','office_id')->withTrashed();
        //   }
          public function property_type()
          {
              return $this->belongsTo(PropertyType::class,'property_type','property_type_id')->withTrashed();
          }
        //   public function division()
        //   {
        //       return $this->belongsTo(Division::class,'div_id','div_id')->withTrashed();
        //   }
        //   public function muncit()
        //   {
        //       return $this->belongsTo(Muncit::class,'muncit_id','muncit_id')->withTrashed();
        //   }
}
