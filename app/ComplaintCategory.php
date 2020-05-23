<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplaintCategory extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function channel_complaint() {
        return $this->hasMany(ChannelComplaint::class);
    }

    public function topic_complaint() {
        return $this->hasMany(TopicComplaint::class);
    }

    public function topic_comment_complaint() {
        return $this->hasMany(TopicCommentComplaint::class);
    }

    public function topic_comment_reply_complaint() {
        return $this->hasMany(TopicCommentReplyComplaint::class);
    }
}
