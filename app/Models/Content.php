<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory  ;


    protected $guarded = [];

    public function postType()
    {
        return $this->belongsTo(PostType::class, 'post_types_id');
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'galleries_id');
    }
}
