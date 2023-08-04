<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class UACS extends Model
{ use SoftDeletes;

    protected $table = 'tbl_uacs_subobject';
    protected $primaryKey = 'uacs_subobject_id';
}
