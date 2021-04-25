<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    /*protected $dates
    = [
        'published_at',
        ];*/

    public function category()
    {
        //article belong to category
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        //article belong user
        return $this->belongsTo(User::class);
    }
}
