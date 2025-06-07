<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batches';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'course_id', 'start_date','fee'];
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function fee(){
        return $this->fee." $";
    }

}
