<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  // One City - Has Many Employees
  public function employees() {
    return $this->hasMany('App\Employee', 'city');
  }

  // One State - Has Many Cities
  public function state() {
    return $this->belongsTo('App\State');
  }
}
