<?php

namespace App\Models;

use App\Traits\Language;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Translatable;

class Slider extends Model
{
    use HasFactory, Language, Translatable;

    protected $translatable = ['title', 'description', 'button_text'];

    //protected $with = ['translations'];

    public function scopeActive($query)
    {
        return $query->whereActive(true)->get();
    }

    /* public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }*/

    public function getPhotoAttribute()
    {
        /// used this  if becuase i used random image  in Factory Seed
        if (Str::contains($this->image, 'lorempixel')) {
            return $this->image;
        }
        $image = Voyager::image($this->image);

        return $image;
    }
}
