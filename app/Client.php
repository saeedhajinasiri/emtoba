<?php

namespace App;

use App\Enums\ELinkType;
use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'job',
        'image',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'state',
        'created_by',
        'updated_by',
    ];

    public function getImageLinkAttribute()
    {
        if ($this->image) {
            return '/images/client/' . $this->image;
        }

        return '/assets/images/product/1.jpg';
    }
}
