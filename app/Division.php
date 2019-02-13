<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
  ];

  // One Division - Has Many Employees
  public function employees() {
    return $this->hasMany('App\Employee', 'division');
  }
}
