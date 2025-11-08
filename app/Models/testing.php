<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class testing extends Model
{
     protected $fillable = ['first_name', 'last_name','gender','email','password'];
     protected $hidden =['password'];
   public $timestamps = false; 
}
