<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
      public function questionFaq() {
          return $this->belongsTo('App\Question','question_id');
  }
}
