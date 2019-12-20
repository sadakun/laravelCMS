<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [
        'comment_id',
        'author',
        'photo',
        'status',
        'email',
        'body',
    ];

    public function comments()
    {
        return $this->belongsTo('App\Comment');
    }
}
