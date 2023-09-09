<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use SoftDeletes;

    protected $table = 'meetings';

    protected $guarded = [];

    public function meetingRoom()
    {
        return $this->belongsTo('App\MeetingRoom');
    }
}
