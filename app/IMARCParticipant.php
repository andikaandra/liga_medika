<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMARCParticipant extends Model
{
    protected $table ="imarcparticipants";
    protected $fillable = ['nama', 'imarc_id', 'universitas', 'jurusan', 'file_path', 'berkas_lengkap', 'deskripsi_berkas'];

	  public function imarc() {
	    return $this->belongsTo('App\IMARC');
	  }
    public $timestamps = false;
}
