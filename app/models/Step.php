<?php

class Step extends Eloquent {

  public function recipe()
  {
    return $this->belongsTo('Recipe');
  }

  public static $rules = [    
    'description' => 'required|min:10'
  ];
}
