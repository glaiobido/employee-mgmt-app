<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
  // One Division - Has Many Employees
  public function employees() {
    return $this->hasMany('App\Employee', 'division');
  }
}
