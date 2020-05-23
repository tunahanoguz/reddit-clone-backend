<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentReply extends Model
{
    protected $fillable = ['body', 'parent_comment_id', 'user_id'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function medias() {
        return $this->hasMany(TopicCommentReplyMedia::class);
    }

    public function votes() {
        return $this->hasMany(TopicVote::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
