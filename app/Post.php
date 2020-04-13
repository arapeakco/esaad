<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    const FILLABLE = ['name', 'post_type_id', 'short_description', 'data'];

    protected $fillable = self::FILLABLE;


    protected $casts = [
        'data' => 'array',
    ];

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    public function scopeFilter($q, $search)
    {
        return $q->where('name', 'like', '%' . $search . '%')
            ->orWhere('short_description', 'like', '%' . $search . '%');
    }

    public function getEmbededUrl()
    {
        return @$this->data['video'] ? 'https://www.youtube.com/embed/' . $this->data['video'] : '';
    }
}
