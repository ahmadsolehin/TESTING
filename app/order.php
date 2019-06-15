<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';

    //Allow All to write except id
    protected $guarded = ['id'];

    public $timestamps = true;
}
