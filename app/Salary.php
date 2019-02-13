<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salary extends Model
{
  // use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  // protected $dates = ['deleted_at'];

  // One Employee - Has Many Salaries
  public function employee() {
    return $this->belongsTo('App\Employee');
  }
}
