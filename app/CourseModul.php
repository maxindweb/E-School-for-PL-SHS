<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseModul extends Model
{
    protected $filable = [
        'modul',
        'description',
        'course_id'
    ];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }

    public function CourseModul()
    {
        return $this->hasMany(CourseModul::class);
    }
}
