<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Online_Survey extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_css_online';
    protected $primaryKey = 'id';
    protected $fillable=['id', 'cc1_online_question',
    'cc1_online_option1', 'cc1_online_option2',
    'cc1_online_option3','cc2_online_question',
    'cc2_online_option1', 'cc2_online_option2',
    'cc2_online_option3','cc3_online_question',
    'cc3_online_option1', 'cc3_online_option2',
    'sqd0_online','sqd0_online', 'sqd1_online','sqd2_online','sqd3_online',
    'sqd4_online','sqd5_online', 'sqd6_online','sqd7_online','sqd8_online',
           'updated_at',
          'created_at',
          'deleted_at'];
}
