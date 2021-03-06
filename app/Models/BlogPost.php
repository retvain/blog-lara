<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    /**
     * @var string[]
     */
    protected $fillable
        = [
            'slug',
            'title',
            'category_id',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        //post belong to category
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        //post belong user
        return $this->belongsTo(User::class);
    }

    public function scopeUserId($query, $id)
    {
        return $query->where('user_id', $id);
    }
}
