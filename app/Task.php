<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
      'title','body','date_start','date_end','back','text','user_id','company_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}
