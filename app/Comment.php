<?php

namespace App;

use App\User;
use App\Driver;
use App\Book;
use App\Offer;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'title', 'feedback'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

}
