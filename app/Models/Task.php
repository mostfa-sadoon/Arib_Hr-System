<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Task extends Model
{
    //
    protected $guarded = [];

    public function  createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }

    public function assignTO()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function   ststus()
    {
        return $this->belongsTo(TaskStatus::class,'status_id');
    }
}
