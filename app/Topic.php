<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name', 'body', 'user_id', 'channel_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function channel() {
        return $this->belongsTo(Channel::class);
    }

    public function medias() {
        return $this->hasMany(TopicMedia::class);
    }

    public function votes() {
        return $this->hasMany(TopicVote::class);
    }

    public function subscriptions() {
        return $this->hasMany(TopicSubscription::class);
    }

    public function complaints() {
        return $this->hasMany(TopicComplaint::class);
    }
}
