<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    public function getStudents(){
        return $this->hasMany(student::class);
    }

    public function getTeachers(){
        return $this->hasMany(teacher::class);

    }
    public function getCourses() {
        return $this->hasMany(course::class);
    }
    protected $fillable = ['name'];
     public $timestamps = false; 
}
