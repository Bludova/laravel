<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

  public function themes() {
    return $this->belongsTo('App\Category','category_id');
  }

     public function answersFaq()
    {
        return $this->hasOne('App\Answer');
    }


    public function questionsPoli()
    {
        return $this->morphTo();
    }

    //      public function themesPoli()
    // {
    //     return $this->morphMany('App\Category', 'category');
    // }


}
