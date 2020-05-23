<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentReplyMedia extends Model
{
    protected $fillable = ['name', 'description', 'order', 'type', 'topic_comment_reply_id'];

    public function topic() {
        return $this->belongsTo(TopicCommentReply::class);
    }
}
