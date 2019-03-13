<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\carbon;

class Task extends Model
{
    public function user(){

        return $this->belongsTo('App\User');

    }

    public function getDueDateAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }

    use SoftDeletes;

    
   
}
