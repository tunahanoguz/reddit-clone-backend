<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentMedia extends Model
{
    protected $fillable = ['name', 'description', 'order', 'type', 'topic_comment_id'];

    public function topic_comment() {
        return $this->belongsTo(TopicComment::class);
    }
}
