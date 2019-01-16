<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ETicket extends Model
{
    protected $table = "etickets";
    protected $fillable = ['hfgm_id', 'nomor_ticket'];
}
