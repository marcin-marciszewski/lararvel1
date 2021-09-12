<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function cars(){
        return $this->belongsToMany('App\Car');
    }

    public function filteredCars(){
        return $this->belongsToMany('App\Car')->wherePivot('tag_id', $this->id)->orderBy('updated_at', 'DESC');
    }

    protected $fillable = [
        'name'
    ];
}
