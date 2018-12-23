<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
  protected $table = "submission";
  protected $fillable = ['id', 'inamsc_id', 'title', 'file_path'];

  public function inamsc() {
    return $this->belongsTo('App\INAMSC');
  }
}
