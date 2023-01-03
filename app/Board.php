<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function garden()
    {
        return $this->belongsTo('App\garden');
    }

    public function com()
    {
        return $this->hasMany('App\Board_com')->orderBy('date', 'desc');
    }
}
