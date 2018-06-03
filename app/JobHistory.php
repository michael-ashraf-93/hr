<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobHistory extends Model
{
    use SoftDeletes;

    public function Employees()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function Job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }
    public function Company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
