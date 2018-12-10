<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INAMSCParticipant extends Model
{
  protected $table = "inamscparticipants";
  protected $fillable = ['nama', 'inamsc_id','kode_ambassador','universitas', 'jurusan'];

  public $timestamps = false;
}
