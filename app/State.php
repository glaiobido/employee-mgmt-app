<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'country', 'name',
  ];

  // One State - Has Many Employees
  public function employees() {
    return $this->hasMany('App\Employee', 'state');
  }

  // One Country - Has Many States
  public function country() {
    return $this->belongsTo('App\Country');
  }

  // One State - Has Many Cities
  public function cities() {
    return $this->hasMany('App\City', 'state');
  }
}
