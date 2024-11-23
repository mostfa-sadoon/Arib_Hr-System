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

    protected static function boot()
    {
        parent::boot(); // Ensures core Eloquent functionality is available

        // Customizing model behavior on creation
        static::creating(function ($user) {
            if (is_null($user->password)) {
                $user->password = Hash::make(123456);
            }
        });
    }


    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name']
        );
    }

    // public function setPasswordAttribute($value) {
    //     $this->attributes['password'] = Hash::make($value);
    // }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) =>  Hash::make($value),
        );
    }


    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => $value
                ? asset('uploads/employees/' . $value)
                : asset('uploads/default-profile-picture.jpg'),
        );
    }


    // public function getImgeAttribute($value){
    //     if($value!=null){
    //         return asset('uploads/employee/imgs/'.$value);

    //     }
    //     return asset('uploads/employee/default/default.png');
    // }


    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function manager(){
        return $this->belongsTo(Employee::class,'manager_id');
    }

}
