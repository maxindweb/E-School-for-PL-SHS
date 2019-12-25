<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'course_name',
        'curse_category_id',
        'group_id'
    ];

    public function CourseCategory()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function Group()
    {
        return $this->belongsTo(Group::class);
    }

    public function Assigment()
    {
        return $this->hasMany(Assigment::class);
    }
    
    public function Quiz()
    {
        return  $this->hasMany(Quiz::class);
    }
}
