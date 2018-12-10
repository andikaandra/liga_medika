<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payments";
    protected $fillable = ['user_id', 'tipe_lomba', 'location', 'tipe_pembayaran'];

}
