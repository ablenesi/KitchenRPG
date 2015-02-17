<?php

class Ingredient extends Eloquent {

  public function recipe()
  {
    return $this->belongsTo('Recipe');
  }

  public static $rules = [
    'name' => 'required|alpha|min:2',
    'quantity' => 'required|integer|min:1',
    'unit' => 'required|alpha|min:1'];
}
