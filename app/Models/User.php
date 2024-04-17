<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use LogsActivity;
    use SoftDeletes;

    protected $table = 'tbl_employee';

    protected $primaryKey = 'emp_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'emp_id',
    'bio_id',
     'first_name',
     'middle_name',
     'last_name',
     'ext_name',
      'birth_date',
    'gender',
    'pos_id',
    'sec_id',
    'user_name',
    'user_pass',
     'password_hash',
   'is_active',
    'pic_emp',
    'pic_emp_data',
     'emp_status_id',
    'muncit_id',
    'office_id',
      'prov_code',
     'div_id',
    'educ_attainment',
     'higher_educ_ins',
     'eligibility',
     'license',
     'remarks',
      'nat_id',
      'fb',
      'token',
      'youtube',
      'linkedin',
      'payee_id',
      'civil_status',
      'mobile_num',
      'home_num',
      'home_address',
      'hire_date',
      'sss_num',
      'gsis_num',
      'tin_num',
      'ph_num',
      'pagibig_num',
      'year_attended',
 'email_verified_at',
 'remember_token',
     'updated_at',
     'created_at',
     'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_hash', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * roles relationship
     *
     * @var array
     */
    public function office()
    {
        return $this->belongsTo(Office::class,'office_id','office_id')->withTrashed();
    }
    public function division()
    {
        return $this->belongsTo(Division::class,'div_id','div_id')->withTrashed();
    }
    public function empstatus()
    {
        return $this->belongsTo(Empstatus::class,'emp_status_id','emp_status_id')->withTrashed();
    }
    public function muncit()
    {
        return $this->belongsTo(Muncit::class,'muncit_id','muncit_id')->withTrashed();
    }

    public function position()
    {
        return $this->belongsTo(Position::class,'pos_id','pos_id')->withTrashed();
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'sec_id','sec_id')->withTrashed();
    }
    public function province()
    {
        return $this->belongsTo(Province::class,'prov_code','prov_code')->withTrashed();
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class,'gen_id','gender')->withTrashed();
    }
    public function roles()
    {
        return $this->hasMany(UserRole::class,'user_id','emp_id');
    }
  
    public function getDescriptionForEvent(string $eventName): string
    {
        return "User was {$eventName}";
    }


}
