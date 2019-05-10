<?php

namespace App;

use App\Enums\ELinkType;
use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use DateMutators, ImageTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'type',
        'image',
        'state',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * type name accessor
     *
     * @return string
     */
    public function getTypeNameAttribute()
    {
        return trans('admin.links.' . ELinkType::search($this->type));
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
