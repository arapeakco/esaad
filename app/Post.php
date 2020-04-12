<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    const FILLABLE = ['name' , 'post_type_id' , 'short_description' , 'data'];

    protected $fillable = self::FILLABLE;


    protected $casts = [
        'data' => 'array',
    ];

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

}
