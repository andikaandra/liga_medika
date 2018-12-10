<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMARC extends Model
{
    protected $table = "imarc";
    protected $fillable = ['user_id', 'link_travel_plan', 'status_pembayaran', 'filepath','status_lolos'];
}
