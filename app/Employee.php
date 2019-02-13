<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  protected $fillable = [
      'firstname',
      'lastname',
      'middlename',
      'address',
      'zip',
      'age',
      'date_hired',
      'birthdate',
      'country',
      'state',
      'city',
      'department',
      'division',
  ];

  // One City - Has Many Employees
  public function city() {
    return $this->belongsTo('App\City');
  }

  // One State - Has Many Employees
  public function state() {
    return $this->belongsTo('App\State');
  }

  // One Country - Has Many Employees
  public function country() {
    return $this->belongsTo('App\Country');
  }

  // One Department - Has Many Employees
  public function department() {
    return $this->belongsTo('App\Department');
  }

  // One Division - Has Many Employees
  public function division() {
    return $this->belongsTo('App\Division');
  }

  // One Company - Has Many Employees
  public function company() {
    return $this->belongsTo('App\Company');
  }

  // One Employee - Has Many Salaries
  public function salaries() {
    return $this->hasMany('App\Salary', 'employee');
  }
}
