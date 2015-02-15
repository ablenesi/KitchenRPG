<?php

class Recipe extends Eloquent {

  public function user(){
    return $this->belongsTo('User');
  }

  public function ingredients(){
    return $this->hasMany('Ingredient');
  }

  public function steps(){
    return $this->hasMany('Step');
  }

  public function comments(){
    return $this->hasMany('Comment');
  }
}
