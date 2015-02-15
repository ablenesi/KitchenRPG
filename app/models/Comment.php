<?php

class Comment extends Eloquent {

  public function recipe()
  {
    return $this->belongsTo('Recipe');
  }

  public function user()
  {
    return $this->belongsTo('User');
  }
}
