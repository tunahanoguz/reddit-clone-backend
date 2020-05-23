<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentVote extends Model
{
    protected $fillable = ['vote', 'user_id', 'topic_id'];

    public function topic_comment() {
        return $this->belongsTo(TopicComment::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
