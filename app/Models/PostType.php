<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

       // One-to-many relationship with Content
       public function contents()
       {
           return $this->hasMany(Content::class, 'post_types_id');
       }


}
