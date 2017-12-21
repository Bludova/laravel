<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    // public function questions()
    // {
    //     return $this->hasMany('App\Question');
    // }


// public function categoryQuestion()
// {
//     return $this->belongsTo('App\Question');
// }


    public function categoryQuestion()
    {
        return $this->hasOne('App\Question');
    }



    // public function questionsPoli()
    // {
    //     return $this->morphTo();
    // }


    //      public function themesPoli()
    // {
    //     return $this->morphMany('App\Category','');
    // }



    //  public function questionsPoli()
    // {
    //     return $this->morphMany('App\Question', 'questions');
    // }
}
