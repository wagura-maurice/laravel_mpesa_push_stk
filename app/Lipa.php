<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lipa extends Model
{
    protected $fillable = ['amount', 'phone', 'status', 'ip', 'bowserAgent'];
}
