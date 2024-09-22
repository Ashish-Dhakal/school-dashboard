<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'gallery_name',
    ];

    // One-to-many relationship with Content
    public function contents()
    {
        return $this->hasMany(Content::class, 'galleries_id');
    }

    // One-to-many relationship with ImageGallery
    public function imageGalleries()
    {
        return $this->hasMany(ImageGallery::class, 'galleries_id');
    }
}
