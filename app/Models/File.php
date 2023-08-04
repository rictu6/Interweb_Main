<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class File extends Model
{
    use SoftDeletes;
    use LogsActivity;

   
    public $guarded=[];

    protected $table = 'tbl_files';

    public $timestamps=false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'file',
        'cat_id',
        'file_desc',
        'ref_num',
        'title_subject',
       
    ];
   
    public function filecategory()
    {
        return $this->belongsTo(FileCategory::class,'cat_id','cat_id')->withTrashed();
    }
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Files was {$eventName}";
    }
    
}
