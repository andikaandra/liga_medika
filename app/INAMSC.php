<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class INAMSC extends Model
{
    protected $table = "inamsc";
    protected $fillable = ['user_id', 'link_travel_plan', 'status_pembayaran', 'filepath','status_lolos'];
}
