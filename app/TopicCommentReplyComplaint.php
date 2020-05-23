<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentReplyComplaint extends Model
{
    protected $fillable = ['email', 'complaint_category_id', 'body', 'topic_comment_reply_id'];
    public $timestamps = false;

    public function complaint_category() {
        return $this->belongsTo(ComplaintCategory::class);
    }

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
