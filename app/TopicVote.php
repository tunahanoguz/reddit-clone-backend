<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicVote extends Model
{
    protected $fillable = ['vote', 'user_id', 'topic_id'];

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
