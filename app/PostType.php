<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostType extends Model
{
    use Translatable;
    public $translatedAttributes = ['name'];
    public $translationModel = PostTypeTranslation::class;

    const  FILLABLE = ['created_at'];
    protected $fillable = self::FILLABLE;

    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                if ($request->get($attribute . '_' . $key) != null && !empty($request->$attribute . $key)) {
                    $this->{$attribute . ':' . $key} = $request->get($attribute . '_' . $key);
                }
            }
            $this->save();
        }
        return $this;
    }
    public function scopeFilter($q, $search)
    {
        return $q->whereHas('translations' , function ($q) use ($search){
            return $q->filter($search);
        });
    }
}
