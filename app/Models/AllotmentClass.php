<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AllotmentClass extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_uacs_subclass';
    protected $primaryKey = 'uacs_subclass_id';
    protected $fillable=['uacs_subclass_id', 'uacs_classification_id',
    'code', 'description', 'cluster_code',
     'acronym',
           'updated_at',
          'created_at',
          'deleted_at'];
}
