<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Author extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['name', 'description', 'content', 'thumbnail'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getImage()
    {
        if(!$this->thumbnail){
            return asset("images/no_image.jpg");
        }
        return asset("uploads/{$this->thumbnail}");
    }

    public function getBestPost($id)
    {
        $post = Post::where('author_id', $id)->orderBy('view', 'desc')->limit(1)->get();
        return $post;
    }
}
