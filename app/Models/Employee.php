<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Employee extends Authenticatable
{
    //
    protected $guarded = [];


    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name']
        );
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }


    public function getImgeAttribute($value){
        if($value!=null){
            return asset('uploads/employee/imgs/'.$value);

        }
        return asset('uploads/employee/default/default.png');
    }

}
