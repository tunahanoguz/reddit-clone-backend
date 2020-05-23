<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentSubscription extends Model
{
    protected $fillable = ['user_id', 'topic_comment_id'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

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
