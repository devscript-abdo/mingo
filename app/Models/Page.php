<?php

namespace App\Models;

use App\Traits\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Page extends Model
{
    use HasFactory, Language, Translatable;

    protected $translatable = ['title', 'excerpt', 'body', 'meta_description', 'meta_keywords'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getPhotoAttribute()
    {
        $image = Voyager::image($this->image);

        return $image;
    }
}
