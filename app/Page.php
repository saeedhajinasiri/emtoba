<?php

namespace App;

use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use DateMutators, ImageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'keywords',
        'description',
        'page_name',
        'state',
        'created_by',
        'updated_by'
    ];

    /**
     * Get the user that created the page.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * excerpt of content accessor
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        return str_limit($this->content, 100);
    }

    /**
     * image link accessor with default
     *
     * @return string
     */
    public function getImageLinkAttribute()
    {
        if ($this->image) {
            return self::imagePath() . $this->image;
        }

        return '/panel/assets/dist/img/avatar.png';
    }
}
