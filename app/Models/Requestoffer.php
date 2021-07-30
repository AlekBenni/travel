<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Requestoffer extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = ['author', 'phone', 'content', 'offer_slug'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('author')
            ->saveSlugsTo('slug');
    }

    public function getRequestDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.F, Y H:i:s');
    }

}
