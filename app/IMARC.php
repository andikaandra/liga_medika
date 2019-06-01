<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMARC extends Model
{
    protected $table = "imarc";
    protected $fillable = ['user_id', 'link_travel_plan', 'status_pembayaran', 'status_lolos', 'gelombang',
    'status_verif' , 'event_type'];

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function participants() {
      return $this->hasMany('App\IMARCParticipant', 'imarc_id', 'id');
    }

    public function submissions() {
      return $this->hasMany('App\Submission', 'imarc_id', 'id');
    }
}
