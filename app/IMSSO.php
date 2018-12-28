<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMSSO extends Model
{
  protected $table = "imsso";
  protected $fillable = ['user_id', 'link_travel_plan', 'status_pembayaran', 'status_lolos', 'gelombang',
  'status_verif' , 'sport_type', 'file_path'];

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function participants() {
      return $this->hasMany('App\IMSSOParticipant', 'imsso_id', 'id');

    }

}
