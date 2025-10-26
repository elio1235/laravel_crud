<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
     protected $fillable = ['name', 'school_id'];
   public $timestamps = false; 
    public function school(){
        return $this->belongsTo(school::class,"school_id","id");
    }

    public function courses(){
        return $this->hasMany(course::class);
    }
}
