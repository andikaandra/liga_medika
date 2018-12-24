<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMSSOParticipant extends Model
{
  protected $table ="imssoparticipants";
  protected $fillable = ['nama', 'imsso_id', 'universitas', 'jurusan', 'file_path'];

  public function imsso() {
    return $this->belongsTo('App\IMSSO');
  }

  public $timestamps = false;
}
