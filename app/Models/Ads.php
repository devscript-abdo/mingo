<?php

namespace App\Models;

use App\Collections\Ads\AdsCollections;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Ads extends Model
{

    use HasFactory;

    protected $table = 'ads';

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['clicked'] = 0;
    }


    public function scopePublished($query)
    {
        return $query->whereStatus('published')->get();
    }

    public function scopeLocation($query, $location = 'top_slider', $limit = 2)
    {
        return $query->whereLocation($location)
            ->limit($limit)
            ->get();
    }


    public function getPhotoAttribute()
    {
        $image  = Voyager::image($this->image);
        return $image;
    }

    public function newCollection(array $models = [])
    {
        return new AdsCollections($models);
    }
}
