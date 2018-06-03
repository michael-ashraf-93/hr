<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'gender' , 'role', 'phone', 'hire_date',
        'salary', 'commission_pct', 'manager_id',
        'department_id', 'job_id', 'email', 'password','company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function Task()
    {
        return $this->hasMany(Task::class,'user_id','id');
    }
}
