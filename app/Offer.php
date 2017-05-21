<?php

namespace App;

use App\User;
use App\Driver;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'driver_id', 'date', 'time', 'destination', 'est_duration', 'price', 'seat', 'pickup_loc', 'info', 'instant'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }


    public function district(){
        return $this->belongsTo(District::class);
    }

    // public function likes()
    // {
    //     return $this->belongsToMany(User::class, 'likes');
    // }
}
