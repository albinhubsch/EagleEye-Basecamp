<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eagle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'placement', 'state'
    ];

    public function users(){
        $this->belongsToMany('App\User');
    }

    public function events(){
        $this->hasMany('App\Event');
    }
}
