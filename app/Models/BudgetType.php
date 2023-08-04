<?php

namespace App\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
class BudgetType extends Model
{
    use SoftDeletes;

    use LogsActivity;
    protected $table = 'tbl_budget_type';
    protected $primaryKey = 'budget_type_id';
}
