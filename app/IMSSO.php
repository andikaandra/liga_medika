<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMSSO extends Model
{
  protected $table = "imsso";
  protected $fillable = ['user_id', 'link_travel_plan', 'status_pembayaran', 'filepath','status_lolos'];

}
