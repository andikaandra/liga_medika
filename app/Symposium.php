<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symposium extends Model
{
    protected $table = "symposium";
    protected $fillable = ['user_id', 'nama', 'ktp', 'status_pembayaran', 'gelombang',
    'status_verif'];

    public function user() {
      return $this->belongsTo('App\User');
    }
}
