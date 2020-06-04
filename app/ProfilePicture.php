<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
