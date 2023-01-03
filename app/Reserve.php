<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function garden()
    {
        return $this->belongsTo('App\Garden');
    }

    public function review()
    {
        return $this->hasOne('App\Review');
    }

}
