<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'country_code', 'name',
  ];

  // One Country - Has Many Employees
  public function employees() {
    return $this->hasMany('App\Employee', 'country');
  }

  // One Country - Has Many States
  public function states() {
    return $this->hasMany('App\State', 'country');
  }
}
