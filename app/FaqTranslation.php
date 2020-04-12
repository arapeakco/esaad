<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['question' , 'answer'];

    public function scopeFilter($q, $search)
    {
        return $q->where('question', 'like', '%' . $search . '%')
            ->orWhere('answer', 'like', '%' . $search . '%');
    }
}
