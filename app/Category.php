<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function categoryQuestion()
    {
         return $this->hasMany('App\Question');
    }

    public function totalQuestions()
    {
         return $this->hasMany('App\Question')->where('status','1');
    }
    public function noAnswerQuestions()
    {
        return $this->hasMany('App\Question')->where('status','0');
    }

    public function hiddenQuestions()
    {
        return $this->hasMany('App\Question')->where('status','2');
    }

}
