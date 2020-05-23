<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicComment extends Model
{
    protected $fillable = ['body', 'user_id', 'topic_id'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function medias() {
        return $this->hasMany(TopicCommentMedia::class);
    }

    public function votes() {
        return $this->hasMany(TopicCommentVote::class);
    }

    public function complaints() {
        return $this->hasMany(TopicCommentComplaint::class);
    }

    public function hidings() {
        return $this->hasMany(TopicCommentHiding::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
