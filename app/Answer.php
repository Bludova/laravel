<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
      public function questions()
      {
          return $this->belongsTo('App\Question','question_id');
      }

    public function authorAnswer()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
