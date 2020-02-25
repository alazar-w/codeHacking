<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReplay extends Model
{
    protected $fillable = [
        'comment_id',
        'author',
        'email',
        'body',
        'is_active'
    ];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
