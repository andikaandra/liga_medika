<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMARC extends Model
{
    protected $table = "imarc";
    protected $fillable = ['user_id', 'link_travel_plan', 'status_pembayaran', 'status_lolos', 'gelombang',
    'status_verif' , 'event_type', 'file_path'];

    public function user() {
      return $this->belongsTo('App\User');
    }

    public function participants() {
      return $this->hasMany('App\IMARCParticipant', 'imarc_id', 'id');

    }
}
