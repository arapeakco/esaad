<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contact extends Model
{
    protected $fillable = [
        'name' , 'email' , 'phone' , 'subject' ,'message'
    ];


    public function replies()
    {
        return $this->hasMany(Replay::class);
    }

    public function getCreatedAtAttribute($createdAt)
    {
        return Carbon::createFromTimeString($createdAt)->format('Y-m-d');
    }

    public function scopeFilter($q , $search)
    {
        return $q->where('phone', 'like', '%' . $search . '%');
    }
}
