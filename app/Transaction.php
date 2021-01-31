<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'tbltransaction';

    public function frame()
    {
        return $this->belongsTo('App\Frame', 'frame_id', 'id');
    }

    public function lensa()
    {
        return $this->belongsTo('App\Lensa', 'lensa_id', 'id');
    }
}
