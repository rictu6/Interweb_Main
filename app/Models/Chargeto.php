<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Chargeto extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_charge_to';
    protected $primaryKey = 'charge_id';
}
