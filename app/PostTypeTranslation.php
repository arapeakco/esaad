<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTypeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function scopeFilter($q, $search)
    {
        return $q->where('name', 'like', '%' . $search . '%');
    }
}
