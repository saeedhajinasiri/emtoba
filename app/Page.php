<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'content', 'image', 'keywords', 'description', 'page_name', 'state', 'created_by', 'updated_by'];

    /**
     * Get the user that created the page.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getBriefAttribute()
    {
        return str_limit($this->content, 100);
    }

    public function getImageLinkAttribute()
    {
        if ($this->image) {
            return '/images/page/' . $this->image;
        }

        return '/assets/images/product/1.jpg';
    }
}
