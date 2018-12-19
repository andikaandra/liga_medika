<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMARCParticipant extends Model
{
    protected $table ="imarcparticipants";
    protected $fillable = ['nama', 'imarc_id', 'universitas', 'jurusan'];

	  public function imarc() {
	    return $this->belongsTo('App\IMARC');
	  }
    public $timestamps = false;
}
