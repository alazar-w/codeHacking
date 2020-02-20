<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = ['path','name'];
    protected $uploads = '/images/';


    public function getPathAttribute($photo){
        return $this->uploads.$photo;
    }
}
