<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
    ];

    public function Users()
    {
        return $this->hasMany(User::class,'company_id','id');
    }

    public function Jobs()
    {
        return $this->hasMany(Job::class,'company_id','id');
    }

    public function Departments()
    {
        return $this->hasMany(Department::class,'company_id','id');
    }

    public function Employees()
    {
        return $this->hasMany(Employee::class,'company_id','id');
    }

    public function Locations()
    {
        return $this->hasMany(Location::class,'company_id','id');
    }

    public function Countries()
    {
        return $this->hasMany(Country::class,'company_id','id');
    }

    public function Regions()
    {
        return $this->hasMany(Region::class,'company_id','id');
    }

    public function Task()
    {
        return $this->hasMany(Task::class, 'company_id','id');
    }
}
