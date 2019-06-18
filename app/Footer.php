<?php

namespace App;

use App\Enums\EFooterType;
use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
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
        return trans('admin.links.' . EFooterType::flipArray()[$this->type]);
    }

    public function getLinkAttribute()
    {
        if (strpos($this->url, 'https') !== false && strpos($this->url, 'http') !== false) {
            return $this->url;
        }

        return '/' . ltrim($this->url, '/');
    }
}
