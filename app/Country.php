<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  // One Country - Has Many Employees
  public function employees() {
    return $this->hasMany('App\Employee', 'country');
  }

  // One Country - Has Many States
  public function states() {
    return $this->hasMany('App\State', 'country');
  }
}
