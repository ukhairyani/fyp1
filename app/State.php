<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected $fillable = [
        'name', 'name_long', 'code2', 'code3', 'capital',
    ];

    public function offer(){
        return $this->hasMany(Offer::class);
    }
}
