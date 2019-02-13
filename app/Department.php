<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
  ];
  
  // One Department - Has Many Employees
  public function employees() {
    return $this->hasMany('App\Employee', 'department');
  }
}
