<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $filable = [
        'role_name'
    ];

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
