<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Payee extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_payee';
    protected $primaryKey = 'payee_id';
}
