<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class SubAllotment extends Model
{ use SoftDeletes;

    protected $table = 'tbl_sub_allotment';
    protected $primaryKey = 'sub_allotment_id';

    public function appro_dtl()
    {
      return $this->hasMany(ApproSetupDetail::class,'ors_hdr_id','ors_hdr_id');
    }
}
