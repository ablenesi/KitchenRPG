<?php

class Ingredient extends Eloquent {

  public function recipe()
  {
    return $this->belongsTo('Recipe');
  }
}
