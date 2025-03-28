<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasFactory  ;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'sub_desc',
        'galleries_id',
        'feature_image',
        'post_types_id',
        'is_featureNotice',
        'pdf',
        'date',
        'message_from',
    ];

    protected $casts = [
        'date' => 'date',
        'is_featureNotice' => 'boolean',
    ];

    public function postType(): BelongsTo
    {
        return $this->belongsTo(PostType::class, 'post_types_id');
    }

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class, 'galleries_id');
    }
}
