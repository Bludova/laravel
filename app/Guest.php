<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{

  public function question()
  {
      return $this->belongsTo('App\Question','question_id');
  }


}


