<?php

namespace App;

use App\Driver;
use App\Offer;
use App\Book;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'matricNo', 'name', 'noIc', 'noTel', 'email', 'password', 'gender', 'address', 'faculty'
    ];

    public function driver()
    {
        return $this->hasOne(Driver::class, 'user_id');
    }

    public function offer()
    {
        return $this->hasMany(Offer::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
