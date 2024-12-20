<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Department extends Model implements TranslatableContract
{
    //
    use Translatable;
    protected $guarded=[];
    public array $translatedAttributes = ['name'];
    protected $hidden = ['translations'];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
