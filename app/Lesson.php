<?php

namespace App;

use App\Enums\ELinkType;
use App\Traits\DateMutators;
use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
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
        'file',
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
     * file link accessor with default
     *
     * @return string
     */
    public function getFileLinkAttribute()
    {
        if ($this->file) {
            return self::imagePath() . $this->file;
        }

        return '';
    }

    /**
     * download link accessor with default
     *
     * @return string
     */
    public function getDownloadLinkAttribute()
    {
        if ($this->url) {
            return $this->url;
        } else if ($this->file) {
            return $this->file_link;
        }

        return '';
    }
}
