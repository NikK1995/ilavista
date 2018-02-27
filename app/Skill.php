<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  public function user()
{
  return $this->belongsToMany('App\User','skill_user');
}
}
