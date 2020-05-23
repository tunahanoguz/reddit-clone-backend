<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelComplaint extends Model
{
    protected $fillable = ['email', 'complaint_category_id', 'body', 'channel_id'];
    public $timestamps = false;

    public function complaint_category() {
        return $this->belongsTo(ComplaintCategory::class);
    }

    public function channel() {
        return $this->belongsTo(Channel::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}
