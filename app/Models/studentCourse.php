<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentCourse extends Model
{
    public function student() {
        return $this->belongsTo(student::class,"student_id", "id");
    }

    public function course(){
        return $this->belongsTo(course::class,"course_id", "id");
    }
    
}
