<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'street_address','postal_code','city','country_id', 'user_id','company_id'
    ];

    public function Departments()
    {
        return $this->hasMany(Department::class,'location_is','id');
    }

    public function Country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function Company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
