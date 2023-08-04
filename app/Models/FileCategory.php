<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class FileCategory extends Model
{
    use SoftDeletes;
    use LogsActivity;

    public $guarded=[];

    protected $table = 'tbl_util_file_category';

    public $timestamps=false;

    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_id',
        'cat_desc'
     
    ];
    public function files()
    {
        return $this->hasMany(FileCategory::class,'cat_id','cat_id');
    }
    public function filecategories()
    {
        return $this->hasMany(FileCategory::class,'cat_id','cat_id');
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return "File Category was {$eventName}";
    }
    
}