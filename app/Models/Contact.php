<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'thumbnail', 'content', 'description'];

    public function getImage()
    {
        if(!$this->thumbnail){
            return asset("images/no_image.jpg");
        }
        return asset("uploads/{$this->thumbnail}");
    }
}
