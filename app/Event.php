<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'description', 'eagle_id'
    ];

    public function eagle(){
        $this->hasOne('App\Eagle');
    }
}
