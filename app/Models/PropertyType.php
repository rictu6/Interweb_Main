<?php

namespace App\Models;



use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyType extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_pms_property_type';
    protected $primaryKey = 'property_type_id';
    protected $fillable=['property_type_id', 'property_type_description'];

}
