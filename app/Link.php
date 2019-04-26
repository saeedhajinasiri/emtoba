<?php

namespace App;

use App\Enums\ELinkType;
use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
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

    public function getTypeNameAttribute()
    {
        return trans('admin.links.' . ELinkType::search($this->type));
    }
}
