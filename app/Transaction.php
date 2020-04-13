<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name', 'phone', 'membership_id' , 'payment_id' , 'status', 'amount',
        'currency', 'credit', 'number'
    ];

}
