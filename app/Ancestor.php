<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ancestor extends Model
{
    protected $fillable = [
        'name', 
        'surname', 
        'age',
        'email'
    ];

    protected $hidden = ['students'];

    protected $appends = ['student_ids'];

    public function students() {
        return $this->belongsToMany('App\Student');
    }

    public function getStudentIdsAttribute()
    {
        return $this->students->pluck('pivot.student_id');
    }
}
