<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Onsite_Survey extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_css_onsite';
    protected $primaryKey = 'id';
    protected $fillable=['id', 'cc1_onsite_question',
    'cc1_onsite_option1', 'cc1_onsite_option2',
    'cc1_onsite_option3','cc1_onsite_option4','cc2_onsite_question',
    'cc2_onsite_option1', 'cc2_onsite_option2',
    'cc2_onsite_option3','cc2_onsite_option4','cc2_onsite_option5','cc3_onsite_question',
    'cc3_onsite_option1', 'cc3_onsite_option2','cc3_onsite_option3', 'cc3_onsite_option4',
    'sqd0_onsite','sqd0_onsite', 'sqd1_onsite','sqd2_onsite','sqd3_onsite',
    'sqd4_onsite','sqd5_onsite', 'sqd6_onsite','sqd7_onsite','sqd8_onsite',
           'updated_at',
          'created_at',
          'deleted_at'];
}
