<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board_com extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
