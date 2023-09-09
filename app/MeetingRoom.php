<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MeetingRoom extends Model
{
    use SoftDeletes;

    protected $table = 'meeting_rooms';

    protected $guarded = [];

    public function meetings()
    {
        return $this->hasMany('App\Meeting');
    }
}

