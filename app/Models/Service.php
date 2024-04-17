<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Service extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_css_service';
    protected $primaryKey = 'id';
    protected $fillable=['id', 'description',
           'updated_at',
          'created_at',
          'deleted_at'];
}