<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function cars(){
        return $this->belongsToMany('App\Car');
    }

    protected $fillable = [
        'name'
    ];
}
