<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    public function forum()
    {
        return $this->belongsTo('App\Models\Forum');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function replies()
    {
        return $this->hasMany('App\Models\DiscussionReply');
    }
}
