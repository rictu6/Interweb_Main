<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FundSource extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_fund_source';
    protected $primaryKey = 'fund_source_id';
}
