<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'media_category_id', 'description', 'featured_image', 'images', 'status'];

    public function mediaCategory(){
        return $this->belongsTo(MediaCategory::class,'media_category_id');
    }

    public function postImages()
    {
        return $this->hasMany(PostImage::class);
    }

}
