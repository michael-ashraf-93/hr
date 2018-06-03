<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'min_salary', 'max_salary', 'user_id','company_id',
    ];

    public function Employees()
    {
        return $this->hasMany(User::class,'job_id','id');
    }

    public function JobHistory()
    {
        return $this->hasMany(JobHistory::class,'job_id','id');
    }

    public function Department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
