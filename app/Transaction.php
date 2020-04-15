<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name', 'phone', 'membership_id' , 'payment_id' , 'status', 'amount',
        'currency', 'credit', 'number'
    ];

    public function member()
    {
        return $this->belongsTo(Post::class , 'membership_id' , 'id')->withDefault();
    }

    public function scopeFilter($q, $search)
    {
        return $q->where('name', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('payment_id', 'like', '%' . $search . '%');
    }

}
