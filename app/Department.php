<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'location_id', 'manager_id', 'user_id','company_id',
    ];

    public function Location()
    {
        return $this->belongsTo(Location::class,'location_id');
    }

    public function Users()
    {
        return $this->hasMany(User::class,'department_id','id');
    }

    public function Employees()
    {
        return $this->hasMany(Employee::class,'department_id','id');
    }

    public function Manager()
    {
        return $this->belongsTo(User::class,'manager_id');
    }

    public function JobHistory()
    {
        return $this->hasMany(JobHistory::class,'department_id','id');
    }

    public function Job()
    {
        return$this->hasMany(Job::class,'department_id','id');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
