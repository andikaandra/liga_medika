<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
  protected $table = "submission";
  protected $guarded= [];

  public function inamsc() {
    return $this->belongsTo('App\INAMSC', 'inamsc_id', 'id');
  }

  public function imarc() {
    return $this->belongsTo('App\IMARC', 'imarc_id', 'id');
  }
}
