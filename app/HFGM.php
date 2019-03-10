<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HFGM extends Model
{
    protected $table = "hfgm";
    protected $fillable = ['user_id', 'type', 'nama', 'ktp', 'status_pembayaran', 'jumlah_tiket', 'gelombang', 'status_verif'];

    public function user() {
      return $this->belongsTo('App\User');
    }
}
