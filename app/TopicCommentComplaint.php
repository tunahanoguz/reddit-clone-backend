<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCommentComplaint extends Model
{
    protected $fillable = ['email', 'complaint_category_id', 'body', 'topic_comment_id'];
    public $timestamps = false;

    public function complaint_category() {
        return $this->belongsTo(ComplaintCategory::class);
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
