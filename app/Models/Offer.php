<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Offer extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['title', 'content', 'second_title', 'thumbnail', 'discount'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getImage()
    {
        if(!$this->thumbnail){
            return asset("images/no_image.jpg");
        }
        return asset("uploads/{$this->thumbnail}");
    }
}
