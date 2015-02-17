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

  public static $rules = [
    'title' => 'required|alpha|min:10',
    'description' => 'required|min:10',
    'serves' => 'required|integer|min:1',
    'prep_time_hours' => 'required|min:0',
    'prep_time_minutes' => 'required|min:1',
    'cook_time_hours' => 'required|min:0',
    'cook_time_minutes' => 'required|min:1',
  ];
}
