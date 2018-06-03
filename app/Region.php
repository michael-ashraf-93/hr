<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'user_id','company_id'
    ];

    public function Countries()
    {
        $this->hasMany(Country::class,'region_id','id');
    }
    public function Company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
