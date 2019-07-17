<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INAMSC extends Model
{
    protected $table = "inamsc";
    protected $guarded = [];

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function participants() {
      return $this->hasMany('App\INAMSCParticipant', 'inamsc_id', 'id');

    }

    public function submissions() {
      return $this->hasMany('App\Submission', 'inamsc_id', 'id');

    }

}
