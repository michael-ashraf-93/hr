<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'fname', 'lname', 'gender' , 'role', 'phone', 'hire_date',
        'salary', 'commission_pct', 'manager_id',
        'department_id', 'job_id', 'email', 'user_id','company_id',
    ];

    public function Department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function DepartmentManager()
    {
        return $this->hasOne(Department::class,'manager_id');
    }

    public function Manager()
    {
        return $this->belongsTo(User::class,'manager_id');
    }

    public function Job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

    public function JobHistory()
    {
        return $this->hasMany(JobHistory::class,'user_id','id');
    }
    public function Company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
