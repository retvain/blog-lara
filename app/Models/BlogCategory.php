<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class BlogCategory
 * @package App\Models
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string $parentTitle
 */
class BlogCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Id of root
     */
    const ROOT = 1;

    /**
     * @var string[]
     */
    protected $fillable
    = [
            'title',
            'slug',
            'parent_id',
            'description',
        ];

    /**
     *
     * Get parent category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|BlogCategory
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     *
     * Accessor for blog.admin.category.index
     *
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
            ? 'Root'
            :'???');

        return $title;
    }

//    /**
//     *
//     * Accessor for example
//     *
//     * @return string
//     */
//    public function getTitleAttribute($valueFromObject)
//    {
//        return mb_strtoupper($valueFromObject);
//    }
//
//    /**
//     *
//     * Mutator for example
//     *
//     * @param string $incomingValue
//     */
//    public function setTitleAttribute($incomingValue)
//    {
//        $this->attributes['title'] = mb_strtolower($incomingValue);
//    }

    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }

}
