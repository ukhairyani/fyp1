<?php

namespace App;

use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'user_id', 'noLesen', 'lesen_luput', 'gambar_lesen', 'gambar_ic', 'no_plat', 'jenis_kereta', 'roadtax_luput'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offer()
    {
        return $this->hasMany(Offer::class, 'driver_id');
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

}
