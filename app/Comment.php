<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use App\User;
class Comment extends Model
{
    //

    protected $fillable = ['image_id', 'user_id', 'text'];
  public function user()
    {
        return $this->belongsTo('App\User');
    }
  public function image()
    {
        return $this->belongsTo('App\Image');
    }

}
