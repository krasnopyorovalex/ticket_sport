<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Page
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $text
 * @property string $alias
 * @property string $publish
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @mixin \Eloquent
 * @property-read \App\Image $image
 * @property string $is_published
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereIsPublished($value)
 * @property-read string $url
 */
class Page extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'title', 'description', 'text', 'alias', 'is_published'];

    /**
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return route('page.show', $this->alias);
    }
}
