<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicHiding extends Model
{
    protected $fillable = ['user_id', 'topic_id'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

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
