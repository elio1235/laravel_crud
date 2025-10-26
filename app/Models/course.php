<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
     protected $fillable = ['name', 'school_id', 'teacher_id'];
   public $timestamps = false; 
    public function school(){
        return $this->belongsTo(school::class,"school_id","id");
    }

    public function teacher(){
        return $this->belongsTo(teacher::class,"teacher_id","id");
    }

    public function students() {
        return $this->belongsToMany(student::class,"studentCourse","course_id","student_id");
    }

}
