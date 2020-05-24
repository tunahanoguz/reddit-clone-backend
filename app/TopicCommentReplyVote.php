<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentReplyVote extends Model
{
    protected $fillable = ['vote', 'user_id', 'topic_comment_reply_id'];

    public function topic_comment_reply() {
        return $this->belongsTo(TopicCommentReply::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
