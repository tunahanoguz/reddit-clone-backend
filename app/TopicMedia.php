<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicMedia extends Model
{
    protected $fillable = ['name', 'description', 'order', 'type', 'topic_id'];

    public function topic() {
        return $this->belongsTo(Topic::class);
    }
}
