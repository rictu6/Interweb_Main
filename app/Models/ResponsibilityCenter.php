<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResponsibilityCenter extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_responsibility_center';
    protected $primaryKey = 'res_center_id';
}
