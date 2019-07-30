<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorValidation extends Model
{
    protected $table = 'error_validations';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'message'];
}
