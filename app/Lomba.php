<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{

  protected $table = "lomba";
  protected $fillable = ['id', 'nama', 'jumlah_gelombang', 'gelombang_sekarang', 'biaya', 'status_pendaftaran',
    'status_pengumpulan', 'kuota', 'dp'];

  public $timestamps = false;
}
