<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $guarded = [];

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }
}
