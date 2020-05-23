<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChannelHiding extends Model
{
    protected $fillable = ['user_id', 'channel_id'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
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
