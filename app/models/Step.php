<?php

class Step extends Eloquent {

  public function recipe()
  {
    return $this->belongsTo('Recipe');
  }
}
