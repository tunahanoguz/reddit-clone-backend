<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicComplaint extends Model
{
    protected $fillable = ['email', 'complaint_category_id', 'body', 'topic_id'];
    public $timestamps = false;

    public function complaint_category() {
        return $this->belongsTo(ComplaintCategory::class);
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
