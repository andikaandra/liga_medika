<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INAMSC extends Model
{
    protected $table = "inamsc";
    protected $fillable = ['user_id', 'link_travel_plan', 'status_pembayaran','status_lolos','type', 'file_path',
    'gelombang', 'status_verif'];

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function participants() {
      return $this->hasMany('App\INAMSCParticipant', 'inamsc_id', 'id');

    }

}
