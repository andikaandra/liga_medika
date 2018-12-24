<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INAMSCParticipant extends Model
{
  protected $table = "inamscparticipants";
  protected $fillable = ['nama', 'inamsc_id','kode_ambassador', 'file_path', 'universitas', 'jurusan'];

  public function inamsc() {
    return $this->belongsTo('App\INAMSC');
  }
  public $timestamps = false;
}
