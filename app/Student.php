<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 
        'surname', 
        'age',
        'email'
    ];

    public function ancestors() {
        return $this->belongsToMany('App\Ancestor');
    }
}
