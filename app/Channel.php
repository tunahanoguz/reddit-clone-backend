<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['name', 'description', 'moderator_id'];

    public function moderators() {
        return $this->hasMany(User::class);
    }

    public function topics() {
        return $this->hasMany(Topic::class);
    }

    public function subscriptions() {
        return $this->hasMany(ChannelSubscription::class);
    }

    public function complaints() {
        return $this->hasMany(ChannelComplaint::class);
    }

    public function hidings() {
        return $this->hasMany(ChannelHiding::class);
    }
}
