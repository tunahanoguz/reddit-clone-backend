<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'profile_picture_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile_picture() {
        return $this->hasOne(ProfilePicture::class);
    }

    public function channels() {
        return $this->belongsToMany(Channel::class, 'channel_moderator', 'moderator_id', 'channel_id');
    }

    public function topics() {
        return $this->hasMany(Topic::class);
    }

    public function topic_comment() {
        return $this->hasMany(TopicComment::class);
    }

    public function topic_comment_reply() {
        return $this->hasMany(TopicCommentReply::class);
    }

    public function channel_subscriptions() {
        return $this->hasMany(ChannelSubscription::class);
    }

    public function topic_subscriptions() {
        return $this->hasMany(TopicSubscription::class);
    }

    public function topic_comment_subscriptions() {
        return $this->hasMany(TopicCommentSubscription::class);
    }

    public function channel_hidings() {
        return $this->hasMany(ChannelHiding::class);
    }

    public function topic_hidings() {
        return $this->hasMany(ChannelHiding::class);
    }

    public function topic_comment_hidings() {
        return $this->hasMany(ChannelHiding::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
