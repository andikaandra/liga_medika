<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INAMSCParticipant extends Model
{
  	protected $table = "inamscparticipants";
	protected $guarded = [];

  public function inamsc() {
    return $this->belongsTo('App\INAMSC');
  }
  public $timestamps = false;
}
