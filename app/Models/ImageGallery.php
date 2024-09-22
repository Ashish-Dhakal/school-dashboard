<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'galleries_id',
        'status',
    ];

    // Defining the relationship with the Gallery
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'galleries_id');
    }
}
