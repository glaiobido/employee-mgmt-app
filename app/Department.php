<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  // One Department - Has Many Employees
  public function employees() {
    return $this->hasMany('App\Employee', 'department');
  }
}
