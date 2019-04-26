<?php

namespace App;

use App\Traits\DateMutators;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use DateMutators;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'commentable_id',
        'commentable_type',
        'user_id',
        'user_name',
        'user_email',
        'user_website',
        'user_ip',
        'parent_id',
        'likes_count',
        'dislikes_count',
        'state',
        'status',
        'created_by',
        'updated_by',
    ];

    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCommentableSectionAttribute()
    {
        return explode('\\', $this->commentable_type)[1];
    }

    public function getCommentableTitleAttribute()
    {
        return $this->commentable->title;
    }

    public function getParentTitleAttribute()
    {
        if ($this->parent_id) {
            return Comment::findOrFail($this->parent_id)->title;
        } else {
            return null;
        }
    }

    public function getStatusNameAttribute()
    {
        return ($this->status == Self::pending ? 'pending' : ($this->status == Self::approved ? 'approved' : 'rejected'));
    }
}
